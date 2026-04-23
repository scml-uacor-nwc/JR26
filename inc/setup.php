<?php
declare(strict_types=1);

add_action('after_setup_theme', function (): void {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails', ['post', 'page']);
	add_theme_support('custom-logo', [
		'height'      => 60,
		'width'       => 180,
		'flex-height' => true,
		'flex-width'  => true,
	]);
	add_theme_support('html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	]);
});