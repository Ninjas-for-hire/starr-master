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

// Theme setup
function star_theme_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'star_theme_setup');

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
