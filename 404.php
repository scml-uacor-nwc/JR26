<?php
declare(strict_types=1);

get_header();
?>

<main id="primary" class="site-main site-main--404">
	<div class="o-container">
		<div class="c-404">
			<p class="c-404__code">404</p>
			<h1 class="c-404__title"><?php esc_html_e('Página não encontrada', 'jr26'); ?></h1>
			<p class="c-404__message"><?php esc_html_e('Nenhum resultado encontrado. Tente pesquisar com outros termos.', 'jr26'); ?></p>
			<div class="c-404__search">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer();
