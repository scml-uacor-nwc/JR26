<?php
declare(strict_types=1);

$section_id = get_sub_field('section_id');
$label      = get_sub_field('label');
$thumbnail  = get_sub_field('thumbnail_image');
$video_url  = get_sub_field('video_url');
$caption    = get_sub_field('caption');
?>

<section
	class="home-featured-video"
	<?php if (!empty($section_id)) : ?>id="<?php echo esc_attr($section_id); ?>"<?php endif; ?>
>

<div class="container">

	<?php if ($label) : ?>
		<h2 class="home-featured-video__title">
			<?php echo esc_html($label); ?>
		</h2>
	<?php endif; ?>

	<div class="home-featured-video__wrapper">

		<a
			class="home-featured-video__link"
			href="<?php echo esc_url($video_url); ?>"
			target="_blank"
			rel="noopener"
		>

			<?php if ($thumbnail) : ?>
				<img
					class="home-featured-video__thumbnail"
					src="<?php echo esc_url($thumbnail['url']); ?>"
					alt="<?php echo esc_attr($thumbnail['alt']); ?>"
				>
			<?php endif; ?>

			<span class="home-featured-video__play">
				▶
			</span>

		</a>

	</div>

	<?php if ($caption) : ?>
		<p class="home-featured-video__caption">
			<?php echo esc_html($caption); ?>
		</p>
	<?php endif; ?>

</div>

</section>
