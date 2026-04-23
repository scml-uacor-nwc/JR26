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
						?>
						<div class="c-debug-fallback c-debug-fallback--error">
							<div class="o-container">
								<p>Empty layout name found in <code>page_sections</code>.</p>
							</div>
						</div>
						<?php
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
				?>
				<div class="c-debug-fallback">
					<div class="o-container">
						<p>No sections added yet in <code>page_sections</code>.</p>
					</div>
				</div>
				<?php
			endif;
			?>
		</main>

		<?php
	endwhile;
endif;

get_footer();