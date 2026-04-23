<?php
declare(strict_types=1);

$section_id          = get_sub_field('section_id');
$top_icon            = get_sub_field('top_icon');
$heading             = get_sub_field('heading');
$content             = get_sub_field('content');
$button_text  = get_sub_field('button_text');
$button_file  = get_sub_field('button_file');
$button_icon  = get_sub_field('button_icon') ?: 'none';
$button_style = get_sub_field('button_style') ?: 'outline';

$file_url   = is_array($button_file) ? ($button_file['url']   ?? '') : '';
$file_label = !empty($button_text)   ? $button_text : (is_array($button_file) ? ($button_file['title'] ?? 'Download') : 'Download');

$button_class = 'c-button c-button--' . $button_style;
?>

<section
	class="home-intro-card-cta"
	<?php if (!empty($section_id)) : ?>
		id="<?php echo esc_attr($section_id); ?>"
	<?php endif; ?>
>
	<div class="o-container">
		<div class="home-intro-card-cta__header">
			<?php if (!empty($top_icon) && is_array($top_icon)) : ?>
				<div class="home-intro-card-cta__icon">
					<img
						src="<?php echo esc_url($top_icon['url']); ?>"
						alt="<?php echo esc_attr($top_icon['alt'] ?? ''); ?>"
					>
				</div>
			<?php endif; ?>

			<?php if (!empty($heading)) : ?>
				<h2 class="home-intro-card-cta__title green-underline">
					<?php echo esc_html($heading); ?>
				</h2>
			<?php endif; ?>
		</div>

		<div class="home-intro-card-cta__card">
			<?php if (!empty($content)) : ?>
				<div class="home-intro-card-cta__content">
					<?php echo wp_kses_post($content); ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($file_url)) : ?>
			<div class="home-intro-card-cta__actions">
				<a
					class="<?php echo esc_attr($button_class); ?>"
					href="<?php echo esc_url($file_url); ?>"
					target="_blank" rel="noopener noreferrer"
				>
					<?php if ($button_icon !== 'none') : ?>
						<?php echo jr26_get_icon($button_icon, 'c-button__icon'); // phpcs:ignore ?>
					<?php endif; ?>
					<span class="c-button__label"><?php echo esc_html($file_label); ?></span>
				</a>
			</div>
		<?php endif; ?>
		</div>
	</div>
</section>