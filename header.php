<?php
declare(strict_types=1);
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-to-content" href="#primary">
	<?php esc_html_e('Saltar para o conteúdo principal', 'jr26'); ?>
</a>

<header class="site-header">
	<div class="o-container">
		<div class="site-header__inner">

			<div class="site-header__logo">
				<?php if (has_custom_logo()) :
					the_custom_logo();
				else : ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>">
						<span class="site-header__logo-text"><?php bloginfo('name'); ?></span>
					</a>
				<?php endif; ?>
			</div>

			<div class="site-header__right">

				<nav class="site-header__nav" id="primary-navigation" aria-label="<?php esc_attr_e('Menu principal', 'jr26'); ?>">
					<div class="site-header__nav-top">
						<div class="site-header__nav-logo" aria-hidden="true">
							<?php if (has_custom_logo()) :
								the_custom_logo();
							else : ?>
								<span class="site-header__logo-text"><?php bloginfo('name'); ?></span>
							<?php endif; ?>
						</div>
						<button
							class="site-header__nav-close js-nav-close"
							aria-label="<?php esc_attr_e('Fechar menu', 'jr26'); ?>"
						></button>
					</div>

					<?php wp_nav_menu([
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'site-header__nav-list',
						'fallback_cb'    => false,
					]); ?>
				</nav>

				<button
					class="site-header__search-toggle js-search-toggle"
					aria-expanded="false"
					aria-controls="site-search-panel"
					aria-label="<?php esc_attr_e('Pesquisar', 'jr26'); ?>"
				>
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
						<circle cx="11" cy="11" r="8"/>
						<line x1="21" y1="21" x2="16.65" y2="16.65"/>
					</svg>
				</button>

				<button
					class="site-header__hamburger js-nav-toggle"
					aria-expanded="false"
					aria-controls="primary-navigation"
					aria-label="<?php esc_attr_e('Abrir menu', 'jr26'); ?>"
				></button>

			</div>

		</div>

		<div class="site-search-panel" id="site-search-panel" role="search" hidden>
			<?php get_search_form(); ?>
			<button class="site-search-panel__close js-search-close" aria-label="<?php esc_attr_e('Fechar pesquisa', 'jr26'); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
					<line x1="18" y1="6" x2="6" y2="18"/>
					<line x1="6" y1="6" x2="18" y2="18"/>
				</svg>
			</button>
		</div>

	</div>
</header>
