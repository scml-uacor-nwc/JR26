<?php
declare(strict_types=1);

get_header();
?>

<main id="primary" class="site-main site-main--search">
	<div class="o-container">

		<?php if (have_posts()) : ?>

			<div class="c-search-results">
				<h1 class="c-search-results__title">
					<?php
					printf(
						esc_html__('Resultados para: %s', 'jr26'),
						'<span>' . esc_html(get_search_query()) . '</span>'
					);
					?>
				</h1>

				<div class="c-search-results__list">
					<?php while (have_posts()) : the_post(); ?>
						<article class="c-search-results__item">
							<h2 class="c-search-results__item-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<?php
							$excerpt = jr26_search_excerpt(get_the_ID(), get_search_query());
							if ($excerpt) : ?>
								<p class="c-search-results__item-excerpt"><?php echo $excerpt; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped — already escaped inside the helper ?></p>
							<?php endif; ?>
						</article>
					<?php endwhile; ?>
				</div>

				<?php the_posts_navigation(); ?>
			</div>

		<?php else : ?>

			<div class="c-404">
				<p class="c-404__code">404</p>
				<h1 class="c-404__title"><?php esc_html_e('Página não encontrada', 'jr26'); ?></h1>
				<p class="c-404__message"><?php esc_html_e('Nenhum resultado encontrado. Tente pesquisar com outros termos.', 'jr26'); ?></p>
				<div class="c-404__search">
					<?php get_search_form(); ?>
				</div>
			</div>

		<?php endif; ?>

	</div>
</main>

<?php get_footer();
