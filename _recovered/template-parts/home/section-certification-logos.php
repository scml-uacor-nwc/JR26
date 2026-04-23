<?php
declare(strict_types=1);

$section_id = get_sub_field('section_id');
$intro_text = get_sub_field('intro_text');

if (!have_rows('logos')) {
	return;
}
?>

<section
	class="section-certification-logos"
	<?php if (!empty($section_id)) : ?>
		id="<?php echo esc_attr($section_id); ?>"
	<?php endif; ?>
>
	<div class="o-container">
		<div class="section-certification-logos__card">
			<?php if (!empty($intro_text)) : ?>
				<p class="section-certification-logos__intro">
					<?php echo esc_html($intro_text); ?>
				</p>
			<?php endif; ?>

			<div class="section-certification-logos__grid">
				<?php while (have_rows('logos')) : the_row(); ?>
					<?php
					$logo     = get_sub_field('logo');
					$url      = get_sub_field('url');
					$alt_text = get_sub_field('alt_text');

					if (empty($logo) || !is_array($logo)) {
						continue;
					}

					$alt = !empty($alt_text)
						? $alt_text
						: (!empty($logo['alt']) ? $logo['alt'] : '');
					?>

					<div class="section-certification-logos__item">
						<?php if (!empty($url)) : ?>
							<a
								class="section-certification-logos__link"
								href="<?php echo esc_url($url); ?>"
								target="_blank"
								rel="noopener noreferrer"
							>
						<?php endif; ?>

						<img
							class="section-certification-logos__image"
							src="<?php echo esc_url($logo['url']); ?>"
							alt="<?php echo esc_attr($alt); ?>"
						>

						<?php if (!empty($url)) : ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>