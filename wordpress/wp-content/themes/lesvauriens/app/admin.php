<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

add_theme_support( 'align-wide' );
add_theme_support( 'editor-color-palette' );
add_theme_support( 'disable-custom-colors' );

// Remove gradient
add_theme_support( 'editor-gradient-presets', array() );
add_theme_support( 'disable-custom-gradients' );

// Remove font size
add_theme_support( 'editor-font-sizes', array() );
add_theme_support( 'disable-custom-font-sizes' );

// Remove patterns
remove_theme_support( 'core-block-patterns' );

// Remove full editing -> TODO
remove_theme_support( 'block-templates' );

function block_available() {
    return array(
        // common.
        'core/paragraph',
        'core/heading',
        'core/list',
        'core/gallery',
        'core/image',
        'core/video',

        // formatting.
        'core/table',

        // layout.
        'core/buttons',
        'core/columns',

        // widgets.
        'core/shortcode',
        'core/audio',

        // embed.
        'core/embed',
    );
}
add_filter( 'allowed_block_types_all', 'block_available', 10, 2 );

add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_script(
        'wpiris-block',
        get_theme_file_uri( './block.js' ),
        array(
            'wp-blocks',
            'wp-edit-post',
            'wp-dom-ready',
        ),
        '1.0',
        true
    );
} );

//function remove_admin_menu_items(){
//    remove_menu_page( 'index.php' );          //Dashboard
//    remove_menu_page( 'edit.php' );           //Posts
//    remove_menu_page( 'edit-comments.php' );  //Comments
//}
//add_action( 'admin_menu', 'remove_admin_menu_items' );
