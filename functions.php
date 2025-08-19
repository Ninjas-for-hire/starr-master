<?php
/**
 * Star Master Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include ACF fields
require_once get_template_directory() . '/includes/acf-fields.php';

// Include theme updater
require_once get_template_directory() . '/includes/theme-updater.php';

// Enqueue styles
function star_enqueue_styles() {
    wp_enqueue_style(
        'star-main-styles',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        filemtime(get_template_directory() . '/assets/css/main.css')
    );
}
add_action('wp_enqueue_scripts', 'star_enqueue_styles');
