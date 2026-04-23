<?php
declare(strict_types=1);

get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();
		?>

		<main id="primary" class="site-main site-main--home">
			<?php
			if (have_rows('page_sections')) :
				while (have_rows('page_sections')) :
					the_row();

					$layout = get_row_layout();

					if (!$layout) {
						continue;
					}

					$template_path = locate_template("template-parts/home/section-{$layout}.php", false, false);

					if ($template_path) {
						get_template_part('template-parts/home/section', $layout);
					} else {
						?>
						<section class="c-page-builder-missing-layout">
							<div class="o-container">
								<p>
									Missing template part for layout:
									<strong><?php echo esc_html($layout); ?></strong>
								</p>
							</div>
						</section>
						<?php
					}
				endwhile;
			else :
				?>
				<section class="c-page-builder-empty">
					<div class="o-container">
						<p>No homepage sections were found. Please add sections in ACF.</p>
					</div>
				</section>
				<?php
			endif;
			?>
		</main>

		<?php
	endwhile;
endif;

get_footer();