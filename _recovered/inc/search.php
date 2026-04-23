<?php
declare(strict_types=1);

/**
 * Extend WordPress search to include ACF / custom field values stored in postmeta.
 *
 * By default WP only searches post_title and post_content. Since this theme
 * stores page content in ACF fields (wp_postmeta), we replace the search SQL
 * clause to also run an EXISTS sub-query against postmeta.
 */
/**
 * Build a contextual excerpt for a search result.
 *
 * Looks through post_content first, then all plain-text postmeta values,
 * and returns a ~160-char snippet with the search term wrapped in <mark>.
 * Returns an empty string if no match is found.
 */
function jr26_search_excerpt(int $post_id, string $term): string {
	if (empty($term)) {
		return '';
	}

	// Collect candidate text sources: post_content + all string postmeta values.
	$post        = get_post($post_id);
	$candidates  = [];

	if ($post && ! empty($post->post_content)) {
		$candidates[] = $post->post_content;
	}

	global $wpdb;
	$meta_rows = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT meta_value FROM {$wpdb->postmeta}
			 WHERE post_id = %d AND meta_value LIKE %s",
			$post_id,
			'%' . $wpdb->esc_like($term) . '%'
		)
	);

	foreach ($meta_rows as $value) {
		// Skip serialised data and very short strings.
		if (is_serialized($value) || mb_strlen($value) < mb_strlen($term) + 10) {
			continue;
		}
		$candidates[] = $value;
	}

	// Find the first candidate that contains the term and build a snippet.
	foreach ($candidates as $text) {
		// Strip HTML and normalise whitespace.
		$plain = preg_replace('/\s+/', ' ', wp_strip_all_tags($text));
		$pos   = mb_stripos($plain, $term);

		if ($pos === false) {
			continue;
		}

		$pad   = 80;
		$start = max(0, $pos - $pad);
		$end   = min(mb_strlen($plain), $pos + mb_strlen($term) + $pad);

		$snippet  = ($start > 0 ? '…' : '');
		$snippet .= mb_substr($plain, $start, $end - $start);
		$snippet .= ($end < mb_strlen($plain) ? '…' : '');

		// Highlight the matched term with <mark>.
		$snippet = preg_replace(
			'/' . preg_quote($term, '/') . '/iu',
			'<mark>$0</mark>',
			esc_html($snippet)
		);

		return $snippet;
	}

	return '';
}

add_filter('posts_search', function (string $search, \WP_Query $query): string {
	if (! $query->is_search() || ! $query->is_main_query()) {
		return $search;
	}

	$term = $query->get('s');

	if (empty($term)) {
		return $search;
	}

	global $wpdb;

	$like = '%' . $wpdb->esc_like($term) . '%';

	$search = $wpdb->prepare(
		" AND (
			({$wpdb->posts}.post_title LIKE %s)
			OR ({$wpdb->posts}.post_content LIKE %s)
			OR EXISTS (
				SELECT 1 FROM {$wpdb->postmeta} pm
				WHERE pm.post_id = {$wpdb->posts}.ID
				AND pm.meta_value LIKE %s
			)
		)",
		$like,
		$like,
		$like
	);

	return $search;
}, 10, 2);
