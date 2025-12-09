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


/**
 * Output ACF Styling Options as CSS
 */
function output_acf_styling_css() {
    // Get all styling options from ACF
    $heading_styles = get_field('styling_settings_heading_copy_styles', 'option');
    $body_styles = get_field('styling_settings_body_copy_styles', 'option');
    $main_menu_styles = get_field('styling_settings_main_menu_styles', 'option');
    $footer_headings_styles = get_field('styling_settings_footer_headings_styles', 'option');
    $footer_copy_styles = get_field('styling_settings_footer_copy_styles', 'option');
    $menu_tab_styles = get_field('styling_settings_menu_tab_styles', 'option');
    $menu_item_heading_styles = get_field('styling_settings_menu_item_heading_styles', 'option');
    $menu_item_body_styles = get_field('styling_settings_menu_item_body_styles', 'option');

    ?>
    <style>
        /* ===== MOBILE-FIRST BASE STYLES ===== */

        /* ===== HEADING COPY STYLES ===== */
        .concept_section .concept_section_inner .content .concept_title, .cuisine_section .cuisine_section_inner .right .content_section .cuisine_title,  .chef_section .chef_section_inner .right .chef_title  {
        <?php if (isset($heading_styles['styling']['font_family']) && $heading_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($heading_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($heading_styles['mobile']['font_size']) && $heading_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($heading_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($heading_styles['mobile']['line_height']) && $heading_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($heading_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        <?php if (isset($heading_styles['styling']['colour']) && $heading_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($heading_styles['styling']['colour']); ?>;
        <?php endif; ?>
        }



        /* ===== BODY COPY STYLES ===== */
        body, p, .body-text {
        <?php if (isset($body_styles['styling']['font_family']) && $body_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($body_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($body_styles['styling']['colour']) && $body_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($body_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($body_styles['mobile']['font_size']) && $body_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($body_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($body_styles['mobile']['line_height']) && $body_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($body_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        /* ===== MAIN MENU STYLES ===== */

        header .inner_header a:after {
        <?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
            background-color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?>;
        <?php endif; ?>
        }

        header .inner_header .left-menu a, header .inner_header .right-menu a {
        <?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
            border-color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($main_menu_styles['styling']['font_family']) && $main_menu_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($main_menu_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($main_menu_styles['desktop']['font_size']) && $main_menu_styles['desktop']['font_size']) : ?>
            font-size: <?php echo esc_attr($main_menu_styles['desktop']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($main_menu_styles['desktop']['line_height']) && $main_menu_styles['desktop']['line_height']) : ?>
            line-height: <?php echo esc_attr($main_menu_styles['desktop']['line_height']); ?>;
        <?php endif; ?>
        }

        .real_header .inner_header .right-menu a:hover {
        <?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
            background-color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?> !important;
        <?php endif; ?>
        }

        .desktop-menu-toggle span {
        <?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
            background-color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?>;
        <?php endif; ?>
        }

        .fake_header .right-menu a:hover {
        <?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
            background-color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?>;
        <?php endif; ?>
        }

        header .inner_header .left-menu a:hover, header .inner_header .right-menu a:hover {
        <?php if (isset($main_menu_styles['styling']['hover_color']) && $main_menu_styles['styling']['hover_color']) : ?>
            color: <?php echo esc_attr($main_menu_styles['styling']['hover_color']); ?>;
        <?php endif; ?>
        }

        /* ===== FOOTER HEADINGS STYLES ===== */
        .footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6, .footer-heading {
        <?php if (isset($footer_headings_styles['styling']['colour']) && $footer_headings_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($footer_headings_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_headings_styles['styling']['font_family']) && $footer_headings_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($footer_headings_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_headings_styles['mobile']['font_size']) && $footer_headings_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($footer_headings_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_headings_styles['mobile']['line_height']) && $footer_headings_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($footer_headings_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
            margin-top: 20px;
        }

        .footer h1:hover, .footer h2:hover, .footer h3:hover, .footer h4:hover, .footer h5:hover, .footer h6:hover, .footer-heading:hover {
        <?php if (isset($footer_headings_styles['styling']['hover_color']) && $footer_headings_styles['styling']['hover_color']) : ?>
            color: <?php echo esc_attr($footer_headings_styles['styling']['hover_color']); ?>;
        <?php endif; ?>
        }

        /* ===== FOOTER COPY STYLES ===== */
        .footer p, .footer-text, .footer-copy, .footer .inner_footer .footer_columns .column .email_signup_link {
        <?php if (isset($footer_copy_styles['styling']['colour']) && $footer_copy_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($footer_copy_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_copy_styles['styling']['font_family']) && $footer_copy_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($footer_copy_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_copy_styles['mobile']['font_size']) && $footer_copy_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($footer_copy_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_copy_styles['mobile']['line_height']) && $footer_copy_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($footer_copy_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        .footer .inner_footer .footer_columns .column .email_signup_link {
            <?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
                border-color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?>;
            <?php endif; ?>
        }

        .footer .inner_footer .footer_columns .column .email_signup_link:hover {
            <?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
                background-color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?> !important;
            <?php endif; ?>
        }

        .footer .inner_footer .footer_columns .column .email_signup_link:hover {
            border-color: <?php echo esc_attr($footer_copy_styles['styling']['hover_color']); ?> !important;
        }

        /* ===== MENU TAB STYLES ===== */
        .menu_section .menu_tabs_nav .menu_tab_button, .html_code_section_inner button{
        <?php if (isset($menu_tab_styles['styling']['colour']) && $menu_tab_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($menu_tab_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['styling']['font_family']) && $menu_tab_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($menu_tab_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['mobile']['font_size']) && $menu_tab_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($menu_tab_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['mobile']['line_height']) && $menu_tab_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($menu_tab_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        .menu-tab:hover, .menu-tabs a:hover, .tab-navigation a:hover, .html_code_section_inner button:hover {
        <?php if (isset($menu_tab_styles['styling']['hover_color']) && $menu_tab_styles['styling']['hover_color']) : ?>
            color: <?php echo esc_attr($menu_tab_styles['styling']['hover_color']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['styling']['bg_hover_colour']) && $menu_tab_styles['styling']['bg_hover_colour']) : ?>
            background-color: <?php echo esc_attr($menu_tab_styles['styling']['bg_hover_colour']); ?>;
        <?php endif; ?>
        }

        /* ===== MENU ITEM HEADING STYLES ===== */
        .menu_section .menu_items_list .menu_item .menu_item_header .menu_item_title, .menu_section_title, .menu_item_price, .menu_description {
        <?php if (isset($menu_item_heading_styles['styling']['colour']) && $menu_item_heading_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($menu_item_heading_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_heading_styles['styling']['font_family']) && $menu_item_heading_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($menu_item_heading_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_heading_styles['mobile']['font_size']) && $menu_item_heading_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($menu_item_heading_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_heading_styles['mobile']['line_height']) && $menu_item_heading_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($menu_item_heading_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        /* ===== MENU ITEM BODY STYLES ===== */
        .menu_item_ingredients, .menu_item .description p {
        <?php if (isset($menu_item_body_styles['styling']['colour']) && $menu_item_body_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($menu_item_body_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_body_styles['styling']['font_family']) && $menu_item_body_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($menu_item_body_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_body_styles['mobile']['font_size']) && $menu_item_body_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($menu_item_body_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_body_styles['mobile']['line_height']) && $menu_item_body_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($menu_item_body_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        /* ===== TABLET STYLES (768px and up) ===== */
        @media (min-width: 768px) {
            /* Heading Copy - Tablet */
            .concept_section .concept_section_inner .content .concept_title, .cuisine_section .cuisine_section_inner .right .content_section .cuisine_title,  .chef_section .chef_section_inner .right .chef_title, .html_code_section_inner h2  {
            <?php if (isset($heading_styles['tablet']['font_family']) && $heading_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($heading_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($heading_styles['tablet']['font_size']) && $heading_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($heading_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($heading_styles['tablet']['line_height']) && $heading_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($heading_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Body Copy - Tablet */
            body, p, .body-text, .html_code_section_inner input, .html_code_section_inner label {
            <?php if (isset($body_styles['tablet']['font_family']) && $body_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($body_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($body_styles['tablet']['font_size']) && $body_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($body_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($body_styles['tablet']['line_height']) && $body_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($body_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Main Menu - Tablet */
            header .inner_header .left-menu a, header .inner_header .right-menu a {
            <?php if (isset($main_menu_styles['tablet']['font_family']) && $main_menu_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($main_menu_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($main_menu_styles['tablet']['font_size']) && $main_menu_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($main_menu_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($main_menu_styles['tablet']['line_height']) && $main_menu_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($main_menu_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Footer Headings - Tablet */
            .footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6, .footer-heading {
            <?php if (isset($footer_headings_styles['tablet']['font_family']) && $footer_headings_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($footer_headings_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($footer_headings_styles['tablet']['font_size']) && $footer_headings_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($footer_headings_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($footer_headings_styles['tablet']['line_height']) && $footer_headings_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($footer_headings_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Footer Copy - Tablet */
            .footer p, .footer-text, .footer-copy {
            <?php if (isset($footer_copy_styles['tablet']['font_family']) && $footer_copy_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($footer_copy_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($footer_copy_styles['tablet']['font_size']) && $footer_copy_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($footer_copy_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($footer_copy_styles['tablet']['line_height']) && $footer_copy_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($footer_copy_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Menu Tab - Tablet */
            .menu_section .menu_tabs_nav .menu_tab_button, #lead_submit {
            <?php if (isset($menu_tab_styles['tablet']['font_family']) && $menu_tab_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($menu_tab_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_tab_styles['tablet']['font_size']) && $menu_tab_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($menu_tab_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_tab_styles['tablet']['line_height']) && $menu_tab_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($menu_tab_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Menu Item Heading - Tablet */
            .menu_section .menu_items_list .menu_item .menu_item_header .menu_item_title, .menu_section_title, .menu_item_price {
            <?php if (isset($menu_item_heading_styles['tablet']['font_family']) && $menu_item_heading_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($menu_item_heading_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_item_heading_styles['tablet']['font_size']) && $menu_item_heading_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($menu_item_heading_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_item_heading_styles['tablet']['line_height']) && $menu_item_heading_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($menu_item_heading_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Menu Item Body - Tablet */
            .menu_item_ingredients {
            <?php if (isset($menu_item_body_styles['tablet']['font_family']) && $menu_item_body_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($menu_item_body_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_item_body_styles['tablet']['font_size']) && $menu_item_body_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($menu_item_body_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_item_body_styles['tablet']['line_height']) && $menu_item_body_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($menu_item_body_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }
        }

        /* ===== DESKTOP STYLES (1024px and up) ===== */
        @media (min-width: 1024px) {
            /* Heading Copy - Tablet */
            .concept_section .concept_section_inner .content .concept_title, .cuisine_section .cuisine_section_inner .right .content_section .cuisine_title,  .chef_section .chef_section_inner .right .chef_title  {
            <?php if (isset($heading_styles['tablet']['font_family']) && $heading_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($heading_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($heading_styles['tablet']['font_size']) && $heading_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($heading_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($heading_styles['tablet']['line_height']) && $heading_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($heading_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Body Copy - Tablet */
            body, p, .body-text {
            <?php if (isset($body_styles['tablet']['font_family']) && $body_styles['tablet']['font_family']) : ?>
                font-family: <?php echo esc_attr($body_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($body_styles['tablet']['font_size']) && $body_styles['tablet']['font_size']) : ?>
                font-size: <?php echo esc_attr($body_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($body_styles['tablet']['line_height']) && $body_styles['tablet']['line_height']) : ?>
                line-height: <?php echo esc_attr($body_styles['tablet']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Main Menu - Tablet */
            header .inner_header .left-menu a, header .inner_header .right-menu a {
            <?php if (isset($main_menu_styles['desktop']['font_family']) && $main_menu_styles['desktop']['font_family']) : ?>
                font-family: <?php echo esc_attr($main_menu_styles['desktop']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($main_menu_styles['desktop']['font_size']) && $main_menu_styles['desktop']['font_size']) : ?>
                font-size: <?php echo esc_attr($main_menu_styles['desktop']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($main_menu_styles['desktop']['line_height']) && $main_menu_styles['desktop']['line_height']) : ?>
                line-height: <?php echo esc_attr($main_menu_styles['desktop']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Footer Headings - Tablet */
            .footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6, .footer-heading {
            <?php if (isset($footer_headings_styles['desktop']['font_family']) && $footer_headings_styles['desktop']['font_family']) : ?>
                font-family: <?php echo esc_attr($footer_headings_styles['desktop']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($footer_headings_styles['desktop']['font_size']) && $footer_headings_styles['desktop']['font_size']) : ?>
                font-size: <?php echo esc_attr($footer_headings_styles['desktop']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($footer_headings_styles['desktop']['line_height']) && $footer_headings_styles['desktop']['line_height']) : ?>
                line-height: <?php echo esc_attr($footer_headings_styles['desktop']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Footer Copy - Tablet */
            .footer p, .footer-text, .footer-copy {
            <?php if (isset($footer_copy_styles['desktop']['font_family']) && $footer_copy_styles['desktop']['font_family']) : ?>
                font-family: <?php echo esc_attr($footer_copy_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($footer_copy_styles['desktop']['font_size']) && $footer_copy_styles['desktop']['font_size']) : ?>
                font-size: <?php echo esc_attr($footer_copy_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($footer_copy_styles['desktop']['line_height']) && $footer_copy_styles['desktop']['line_height']) : ?>
                line-height: <?php echo esc_attr($footer_copy_styles['desktop']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Menu Tab - Tablet */
            .menu_section .menu_tabs_nav .menu_tab_button, #lead_submit {
            <?php if (isset($menu_tab_styles['desktop']['font_family']) && $menu_tab_styles['desktop']['font_family']) : ?>
                font-family: <?php echo esc_attr($menu_tab_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_tab_styles['desktop']['font_size']) && $menu_tab_styles['desktop']['font_size']) : ?>
                font-size: <?php echo esc_attr($menu_tab_styles['tablet']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_tab_styles['desktop']['line_height']) && $menu_tab_styles['desktop']['line_height']) : ?>
                line-height: <?php echo esc_attr($menu_tab_styles['desktop']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Menu Item Heading - Tablet */
            .menu_section .menu_items_list .menu_item .menu_item_header .menu_item_title, .menu_section_title, .menu_item_price {
            <?php if (isset($menu_item_heading_styles['desktop']['font_family']) && $menu_item_heading_styles['desktop']['font_family']) : ?>
                font-family: <?php echo esc_attr($menu_item_heading_styles['tablet']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_item_heading_styles['desktop']['font_size']) && $menu_item_heading_styles['desktop']['font_size']) : ?>
                font-size: <?php echo esc_attr($menu_item_heading_styles['desktop']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_item_heading_styles['desktop']['line_height']) && $menu_item_heading_styles['desktop']['line_height']) : ?>
                line-height: <?php echo esc_attr($menu_item_heading_styles['desktop']['line_height']); ?>;
            <?php endif; ?>
            }

            /* Menu Item Body - Tablet */
            .menu_item_ingredients {
            <?php if (isset($menu_item_body_styles['desktop']['font_family']) && $menu_item_body_styles['desktop']['font_family']) : ?>
                font-family: <?php echo esc_attr($menu_item_body_styles['desktop']['font_family']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_item_body_styles['desktop']['font_size']) && $menu_item_body_styles['desktop']['font_size']) : ?>
                font-size: <?php echo esc_attr($menu_item_body_styles['desktop']['font_size']); ?>;
            <?php endif; ?>
            <?php if (isset($menu_item_body_styles['desktop']['line_height']) && $menu_item_body_styles['desktop']['line_height']) : ?>
                line-height: <?php echo esc_attr($menu_item_body_styles['desktop']['line_height']); ?>;
            <?php endif; ?>
            }<?php if (isset($main_menu_styles['styling']['colour']) && $main_menu_styles['styling']['colour']) : ?>
                                                                                                               color: <?php echo esc_attr($main_menu_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($main_menu_styles['styling']['font_family']) && $main_menu_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($main_menu_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($main_menu_styles['mobile']['font_size']) && $main_menu_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($main_menu_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($main_menu_styles['mobile']['line_height']) && $main_menu_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($main_menu_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        .main-menu a:hover, .header-menu a:hover, nav a:hover {
        <?php if (isset($main_menu_styles['styling']['hover_color']) && $main_menu_styles['styling']['hover_color']) : ?>
            color: <?php echo esc_attr($main_menu_styles['styling']['hover_color']); ?>;
        <?php endif; ?>
        }

        /* Footer Headings - Mobile */
        .footer h1, .footer h2, .footer h3, .footer h4, .footer h5, .footer h6, .footer-heading {
        <?php if (isset($footer_headings_styles['styling']['colour']) && $footer_headings_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($footer_headings_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_headings_styles['styling']['font_family']) && $footer_headings_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($footer_headings_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_headings_styles['mobile']['font_size']) && $footer_headings_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($footer_headings_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_headings_styles['mobile']['line_height']) && $footer_headings_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($footer_headings_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        .footer h1:hover, .footer h2:hover, .footer h3:hover, .footer h4:hover, .footer h5:hover, .footer h6:hover, .footer-heading:hover {
        <?php if (isset($footer_headings_styles['styling']['hover_color']) && $footer_headings_styles['styling']['hover_color']) : ?>
            color: <?php echo esc_attr($footer_headings_styles['styling']['hover_color']); ?>;
        <?php endif; ?>
        }

        /* Footer Copy - Mobile */
        .footer p, .footer a, .footer span {
        <?php if (isset($footer_copy_styles['styling']['colour']) && $footer_copy_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($footer_copy_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_copy_styles['styling']['font_family']) && $footer_copy_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($footer_copy_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_copy_styles['mobile']['font_size']) && $footer_copy_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($footer_copy_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($footer_copy_styles['mobile']['line_height']) && $footer_copy_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($footer_copy_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        .footer a:after {
            <?php if (isset($footer_copy_styles['styling']['colour']) && $footer_copy_styles['styling']['colour']) : ?>
                background-color: <?php echo esc_attr($footer_copy_styles['styling']['colour']); ?>;
            <?php endif; ?>
        }

        .footer a {
            text-decoration: none;
        }

        .footer a:hover {
        <?php if (isset($footer_copy_styles['styling']['hover_color']) && $footer_copy_styles['styling']['hover_color']) : ?>
            color: <?php echo esc_attr($footer_copy_styles['styling']['hover_color']); ?>;
        <?php endif; ?>
        }

        /* Menu Tab - Mobile */
        .menu_section .menu_tabs_nav .menu_tab_button, #lead_submit {
        <?php if (isset($menu_tab_styles['styling']['colour']) && $menu_tab_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($menu_tab_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['styling']['font_family']) && $menu_tab_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($menu_tab_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['mobile']['font_size']) && $menu_tab_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($menu_tab_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['mobile']['line_height']) && $menu_tab_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($menu_tab_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        .menu_section .menu_tabs_nav .menu_tab_button:hover {
        <?php if (isset($menu_tab_styles['styling']['hover_color']) && $menu_tab_styles['styling']['hover_color']) : ?>
            color: <?php echo esc_attr($menu_tab_styles['styling']['hover_color']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['styling']['bg_hover_colour']) && $menu_tab_styles['styling']['bg_hover_colour']) : ?>
            background-color: <?php echo esc_attr($menu_tab_styles['styling']['bg_hover_colour']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['styling']['bg_hover_colour']) && $menu_tab_styles['styling']['bg_hover_colour']) : ?>
            border-color: <?php echo esc_attr($menu_tab_styles['styling']['bg_hover_colour']); ?>;
        <?php endif; ?>
        }

        .menu_section .menu_tabs_nav .active {
        <?php if (isset($menu_tab_styles['styling']['hover_color']) && $menu_tab_styles['styling']['hover_color']) : ?>
            color: <?php echo esc_attr($menu_tab_styles['styling']['hover_color']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['styling']['bg_hover_colour']) && $menu_tab_styles['styling']['bg_hover_colour']) : ?>
            background-color: <?php echo esc_attr($menu_tab_styles['styling']['bg_hover_colour']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_tab_styles['styling']['bg_hover_colour']) && $menu_tab_styles['styling']['bg_hover_colour']) : ?>
            border-color: <?php echo esc_attr($menu_tab_styles['styling']['bg_hover_colour']); ?>;
        <?php endif; ?>
        }

        /* Menu Item Heading - Mobile */
        .menu_section .menu_items_list .menu_item .menu_item_header .menu_item_title, .menu_section_title, .menu_item_price {
        <?php if (isset($menu_item_heading_styles['styling']['colour']) && $menu_item_heading_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($menu_item_heading_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_heading_styles['styling']['font_family']) && $menu_item_heading_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($menu_item_heading_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_heading_styles['mobile']['font_size']) && $menu_item_heading_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($menu_item_heading_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_heading_styles['mobile']['line_height']) && $menu_item_heading_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($menu_item_heading_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }

        /* Menu Item Body - Mobile */
        .menu_item_ingredients {
        <?php if (isset($menu_item_body_styles['styling']['colour']) && $menu_item_body_styles['styling']['colour']) : ?>
            color: <?php echo esc_attr($menu_item_body_styles['styling']['colour']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_body_styles['styling']['font_family']) && $menu_item_body_styles['styling']['font_family']) : ?>
            font-family: <?php echo esc_attr($menu_item_body_styles['styling']['font_family']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_body_styles['mobile']['font_size']) && $menu_item_body_styles['mobile']['font_size']) : ?>
            font-size: <?php echo esc_attr($menu_item_body_styles['mobile']['font_size']); ?>;
        <?php endif; ?>
        <?php if (isset($menu_item_body_styles['mobile']['line_height']) && $menu_item_body_styles['mobile']['line_height']) : ?>
            line-height: <?php echo esc_attr($menu_item_body_styles['mobile']['line_height']); ?>;
        <?php endif; ?>
        }
        }
    </style>
    <?php
}

// Hook the function to wp_head to output the styles
add_action('wp_head', 'output_acf_styling_css');