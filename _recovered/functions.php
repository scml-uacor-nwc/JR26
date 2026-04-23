<?php
declare(strict_types=1);

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/acf.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/menus.php';
require_once get_template_directory() . '/inc/theme-support.php';
require_once get_template_directory() . '/inc/search.php';
require_once get_template_directory() . '/inc/integrations/google-analytics.php';

add_theme_support('post-thumbnails', ['post']);

function blueprint2026_enqueue_fonts() {

    wp_enqueue_style(
        'blueprint2026-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700;800&family=Roboto+Condensed:wght@300;400;500&display=swap',
        [],
        null
    );

}

add_action('wp_enqueue_scripts', 'blueprint2026_enqueue_fonts');

