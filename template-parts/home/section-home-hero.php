<?php
declare(strict_types=1);

$section_id   = get_sub_field('section_id');
$title        = get_sub_field('title');
$description  = get_sub_field('description');
$banner_image = get_sub_field('banner_image');
$banner_link  = get_sub_field('banner_link');
$banner_alt   = get_sub_field('banner_alt');

$section_attr = '';

if (!empty($section_id)) {
	$section_attr = ' id="' . esc_attr($section_id) . '"';
}
?>

<section<?php echo $section_attr; ?> class="c-home-hero">
	<div class="o-container">
		<div class="c-home-hero__grid">
			<div class="c-home-hero__content">
				<?php if (!empty($title)) : ?>
					<h1 class="c-home-hero__title"><?php echo esc_html($title); ?></h1>
				<?php endif; ?>

				<?php if (!empty($description)) : ?>
					<div class="c-home-hero__description">
						<p><?php echo nl2br(esc_html($description)); ?></p>
					</div>
				<?php endif; ?>
			</div>

			<?php if (!empty($banner_image) && is_array($banner_image)) : ?>
				<div class="c-home-hero__media">
					<?php
					$image_html = wp_get_attachment_image(
						(int) $banner_image['ID'],
						'full',
						false,
						[
							'class' => 'c-home-hero__image',
							'alt'   => !empty($banner_alt)
								? $banner_alt
								: (!empty($banner_image['alt']) ? $banner_image['alt'] : ''),
						]
					);

					if (!empty($banner_link)) :
						?>
						<a class="c-home-hero__image-link" href="<?php echo esc_url($banner_link); ?>">
							<?php echo $image_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>
						<?php
					else :
						echo $image_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					endif;
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>