<?php
declare(strict_types=1);

add_action('wp_enqueue_scripts', function (): void {
	$theme_version = wp_get_theme()->get('Version');

	$main_css_path = get_template_directory() . '/assets/css/main.css';
	$main_js_path  = get_template_directory() . '/assets/js/main.js';

	wp_enqueue_style(
		'jr26-main',
		get_template_directory_uri() . '/assets/css/main.css',
		[],
		file_exists($main_css_path) ? (string) filemtime($main_css_path) : $theme_version
	);

	wp_enqueue_script(
		'jr26-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		file_exists($main_js_path) ? (string) filemtime($main_js_path) : $theme_version,
		true
	);
});