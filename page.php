<?php
declare(strict_types=1);

get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();
		?>

		<main id="primary" class="site-main site-main--page">
			<?php get_template_part('template-parts/components/page-header'); ?>

			<?php
			if (have_rows('general_page_sections')) :
				while (have_rows('general_page_sections')) :
					the_row();

					$layout = get_row_layout();

					if (!$layout) {
						continue;
					}

					$template = "template-parts/sections/section-{$layout}.php";
					$template_path = locate_template($template, false, false);

					if ($template_path) {
						get_template_part('template-parts/sections/section', $layout);
					} else {
						?>
						<div class="c-debug-fallback c-debug-fallback--error">
							<div class="o-container">
								<p>
									Missing section template:
									<strong><?php echo esc_html($template); ?></strong>
								</p>
							</div>
						</div>
						<?php
					}
				endwhile;
			else :
				the_content();
			endif;
			?>
		</main>

		<?php
	endwhile;
endif;

// Add 'Actualizado em' date after the content
if (get_the_modified_time('U') !== get_the_time('U')) {
	?>
	<div class="c-page-updated-date">
		<div class="o-container">
			<p style="font-size: 14px; color: #525252;">
				<?php
				printf(
					esc_html__('Actualizado em: %s', 'jr26'),
					esc_html(get_the_modified_date())
				);
				?>
			</p>
		</div>
	</div>
	<?php
}
get_footer();