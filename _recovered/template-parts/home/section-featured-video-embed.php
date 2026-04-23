<?php
declare(strict_types=1);

$section_id = get_sub_field('section_id');
$label      = get_sub_field('label');
$thumbnail  = get_sub_field('thumbnail_image');
$video_url  = get_sub_field('video_url');
$caption    = get_sub_field('caption');

$embed_url = '';

if (!empty($video_url) && is_string($video_url)) {
	if (preg_match('~(?:youtube\.com/watch\?v=|youtu\.be/)([a-zA-Z0-9_-]+)~', $video_url, $matches)) {
		$embed_url = 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1&rel=0';
	} elseif (preg_match('~vimeo\.com/(\d+)~', $video_url, $matches)) {
		$embed_url = 'https://player.vimeo.com/video/' . $matches[1] . '?autoplay=1';
	}
}
?>

<section
	class="home-featured-video"
	<?php if (!empty($section_id)) : ?>
		id="<?php echo esc_attr($section_id); ?>"
	<?php endif; ?>
>
	<div class="o-container">
		<?php if ($label) : ?>
			<p class="home-featured-video__label">
				<?php echo esc_html($label); ?>
			</p>
		<?php endif; ?>

		<div
			class="home-featured-video__wrapper js-featured-video"
			<?php if ($embed_url) : ?>
				data-embed-url="<?php echo esc_url($embed_url); ?>"
			<?php endif; ?>
		>
			<?php if ($thumbnail) : ?>
				<button
					class="home-featured-video__button"
					type="button"
					aria-label="<?php esc_attr_e('Play video', 'jr26'); ?>"
				>
					<img
						class="home-featured-video__thumbnail"
						src="<?php echo esc_url($thumbnail['url']); ?>"
						alt="<?php echo esc_attr($thumbnail['alt'] ?? ''); ?>"
					>

					<span class="home-featured-video__play" aria-hidden="true"></span>
				</button>
			<?php endif; ?>
		</div>

		<?php if ($caption) : ?>
			<p class="home-featured-video__caption">
				<?php echo esc_html($caption); ?>
			</p>
		<?php endif; ?>
	</div>
</section>