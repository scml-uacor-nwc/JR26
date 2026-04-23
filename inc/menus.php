<?php
declare(strict_types=1);

add_action('after_setup_theme', function (): void {
	register_nav_menus([
		'primary' => __('Menu Principal', 'jr26'),
		'footer'  => __('Menu Rodapé', 'jr26'),
	]);
});
