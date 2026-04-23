<?php
declare(strict_types=1);

$hide_section = (bool) get_sub_field('hide_section');

if ($hide_section) {
	return;
}

$section_id   = get_sub_field('section_id');
$heading      = get_sub_field('heading');
$source       = get_sub_field('source') ?: 'latest';
$posts_count  = (int) (get_sub_field('posts_count') ?: 3);
$category_slug = get_sub_field('category_slug') ?: 'noticias';
$manual_posts = get_sub_field('manual_posts');
$button_text  = get_sub_field('button_text');
$button_url   = get_sub_field('button_url');
$button_icon  = get_sub_field('button_icon') ?: 'arrow';
$button_style = get_sub_field('button_style') ?: 'fill';

$button_class = 'c-button c-button--' . $button_style;
$posts = [];

if ($source === 'manual' && is_array($manual_posts) && !empty($manual_posts)) {
	$posts = $manual_posts;
} else {
	$query_args = [
		'post_type'      => 'post',
		'posts_per_page' => $posts_count > 0 ? $posts_count : 3,
		'post_status'    => 'publish',
		'no_found_rows'  => true,
	];

	if (!empty($category_slug)) {
		$query_args['category_name'] = $category_slug;
	}

	$query = new WP_Query($query_args);

	if ($query->have_posts()) {
		$posts = $query->posts;
		wp_reset_postdata();
	}
}

if (empty($posts)) {
	return;
}
?>

<section
	class="home-news-preview"
	<?php if (!empty($section_id)) : ?>
		id="<?php echo esc_attr($section_id); ?>"
	<?php endif; ?>
>
	<div class="o-container">
		<?php if (!empty($heading)) : ?>
			<div class="home-news-preview__header">
				<h2 class="home-news-preview__title">
					<?php echo esc_html($heading); ?>
				</h2>
			</div>
		<?php endif; ?>

		<div class="home-news-preview__card">
			<div class="home-news-preview__grid">
				<?php foreach ($posts as $post_item) : ?>
					<?php
					$post_id    = $post_item->ID;
					$post_title = get_the_title($post_id);
					$post_url   = get_permalink($post_id);
					$post_date  = get_the_date('d.m.Y', $post_id);
					$image_id   = get_post_thumbnail_id($post_id);
					?>
					<article class="home-news-preview__item">
						<a class="home-news-preview__item-link" href="<?php echo esc_url($post_url); ?>">
							<?php if ($image_id) : ?>
								<div class="home-news-preview__media">
									<?php
									echo wp_get_attachment_image(
										$image_id,
										'large',
										false,
										[
											'class' => 'home-news-preview__image',
										]
									); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									?>
								</div>
							<?php endif; ?>

							<div class="home-news-preview__content">
								<h3 class="home-news-preview__item-title">
									<?php echo esc_html($post_title); ?>
								</h3>

								<p class="home-news-preview__date">
									<?php echo esc_html($post_date); ?>
								</p>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</div>

			<?php if (!empty($button_text) && !empty($button_url)) : ?>
				<div class="home-news-preview__actions">
					<a class="<?php echo esc_attr($button_class); ?>" href="<?php echo esc_url($button_url); ?>">
						<?php
						if ($button_icon !== 'none') {
							echo jr26_get_icon($button_icon, 'c-button__icon');
						}
						?>
						<span class="c-button__label">
							<?php echo esc_html($button_text); ?>
						</span>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>