<?php
declare(strict_types=1);

function jr26_get_icon(string $name, string $class = ''): string
{
	$allowed = ['download', 'arrow', 'external', 'play'];

	if (!in_array($name, $allowed, true)) {
		return '';
	}

	$path = get_template_directory() . "/assets/icons/{$name}.svg";

	if (!file_exists($path)) {
		return '';
	}

	$svg = file_get_contents($path);

	if (!$svg) {
		return '';
	}

	if ($class) {
		$svg = preg_replace(
			'/<svg\b/',
			'<svg class="' . esc_attr($class) . '"',
			$svg,
			1
		);
	}

	return $svg;
}