<?php
declare(strict_types=1);

$hide_page_header = (bool) get_field('hide_page_header');

if ($hide_page_header) {
	return;
}

$title = get_field('page_header_title');
$intro = get_field('page_header_intro');
$image = get_field('page_header_image');

if (empty($title) && empty($intro) && empty($image)) {
	return;
}
?>

<section class="c-page-header">
	<div class="o-container">
		<div class="c-page-header__content">
			<?php if (!empty($title)) : ?>
				<h1 class="c-page-header__title">
					<?php echo esc_html($title); ?>
				</h1>
			<?php endif; ?>

			<?php if (!empty($intro)) : ?>
				<div class="c-page-header__intro">
					<p><?php echo nl2br(esc_html($intro)); ?></p>
				</div>
			<?php endif; ?>
		</div>

		<?php if (!empty($image) && is_array($image)) : ?>
			<div class="c-page-header__media">
				<img
					class="c-page-header__image"
					src="<?php echo esc_url($image['url']); ?>"
					alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
				>
			</div>
		<?php endif; ?>
	</div>
</section>