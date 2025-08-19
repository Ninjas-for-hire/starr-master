<?php
/**
 * ACF Fields Registration
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add ACF Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-admin-customizer',
    ));
}

// Add Header Tab with Logo Field
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_header_settings',
        'title' => 'Header Settings',
        'fields' => array(
            array(
                'key' => 'field_header_tab',
                'label' => 'Header',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ),
            array(
                'key' => 'field_logo',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'instructions' => 'Upload your site logo',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_header_colour',
                'label' => 'Header Colour',
                'name' => 'header_colour',
                'type' => 'color_picker',
                'instructions' => 'Choose the header background colour',
                'default_value' => '#ffffff',
            ),
            array(
                'key' => 'field_left_menu',
                'label' => 'Left Menu',
                'name' => 'left_menu',
                'type' => 'repeater',
                'instructions' => 'Add menu items for the left side of header',
                'sub_fields' => array(
                    array(
                        'key' => 'field_left_menu_link',
                        'label' => 'Menu Link',
                        'name' => 'menu_link',
                        'type' => 'link',
                        'return_format' => 'array',
                    ),
                ),
                'min' => 0,
                'max' => 10,
                'layout' => 'table',
                'button_label' => 'Add Menu Item',
            ),
            array(
                'key' => 'field_right_menu',
                'label' => 'Right Menu',
                'name' => 'right_menu',
                'type' => 'repeater',
                'instructions' => 'Add menu items for the right side of header',
                'sub_fields' => array(
                    array(
                        'key' => 'field_right_menu_link',
                        'label' => 'Menu Link',
                        'name' => 'menu_link',
                        'type' => 'link',
                        'return_format' => 'array',
                    ),
                ),
                'min' => 0,
                'max' => 10,
                'layout' => 'table',
                'button_label' => 'Add Menu Item',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Add Footer Tab
    acf_add_local_field_group(array(
        'key' => 'group_footer_settings',
        'title' => 'Footer Settings',
        'fields' => array(
            array(
                'key' => 'field_footer_tab',
                'label' => 'Footer',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ),
            // Add footer fields here later
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
    ));

    // Add Page Builder Flexible Content
    acf_add_local_field_group(array(
        'key' => 'group_page_builder',
        'title' => 'Page Builder',
        'fields' => array(
            array(
                'key' => 'field_page_builder',
                'label' => 'Page Builder',
                'name' => 'page_builder',
                'type' => 'flexible_content',
                'instructions' => 'Add and arrange page components',
                'layouts' => array(
                    'layout_hero' => array(
                        'key' => 'layout_hero',
                        'name' => 'hero',
                        'label' => 'Hero Section',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_hero_image',
                                'label' => 'Hero Image',
                                'name' => 'hero_image',
                                'type' => 'image',
                                'instructions' => 'Upload the hero background image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                ),
                'button_label' => 'Add Component',
                'min' => '',
                'max' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
}
