<?php
declare(strict_types=1);

$section_id   = get_sub_field('section_id');
$heading      = get_sub_field('heading');
$text         = get_sub_field('text');

$button_text  = get_sub_field('button_text');
$button_url   = get_sub_field('button_url');
$button_icon  = get_sub_field('button_icon') ?: 'arrow';
$button_style = get_sub_field('button_style') ?: 'fill';

$button_class = 'c-button c-button--' . $button_style;
?>

<section
	class="section-contact-help"
	<?php if ($section_id) : ?>
		id="<?php echo esc_attr($section_id); ?>"
	<?php endif; ?>
>
	<div class="o-container">
		<div class="section-contact-help__card">
			<div class="section-contact-help__inner">
				<?php if ($heading) : ?>
					<h2 class="section-contact-help__title">
						<?php echo esc_html($heading); ?>
					</h2>
				<?php endif; ?>

				<?php if ($text) : ?>
					<div class="section-contact-help__text">
						<?php echo wp_kses_post($text); ?>
					</div>
				<?php endif; ?>

				<?php if ($button_text && $button_url) : ?>
					<div class="section-contact-help__actions">
						<a
							class="<?php echo esc_attr($button_class); ?>"
							href="<?php echo esc_url($button_url); ?>"
						>
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
	</div>
</section>