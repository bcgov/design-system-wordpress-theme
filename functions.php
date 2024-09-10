<?php
/**
 * Enqueues the design system CSS stylesheet on the frontend of the WordPress site.
 *
 * @since 1.3.0
 */
function design_system_public_enqueue_global_styles() {
    $version = filemtime( get_template_directory() . '/dist/index.css' );
    wp_enqueue_style( 'design-system-styles', get_template_directory_uri() . '/dist/index.css', array(), $version );
}

add_action( 'enqueue_block_assets', 'design_system_public_enqueue_global_styles' );

/**
 * Enqueues the main scripts file.
 */
function design_system_enqueue_global_js_scripts() {
    wp_enqueue_script(
        'my-custom-block-variations',
        get_template_directory_uri() . '/dist/index.js',
        array( 'wp-blocks', 'wp-element' ),
        filemtime( get_template_directory() . '/dist/index.js' ),
        true
    );
}

add_action( 'enqueue_block_editor_assets', 'design_system_enqueue_global_js_scripts' );

/**
 * Includes all block style variation PHP files from blocks/core directory recursively.
 *
 * @param string $dir_path The path of the directory to include files from.
 */
function design_system_include_block_style_variations( $dir_path ) {
    // Create a recursive directory iterator.
    $iterator = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $dir_path ) );

    // Loop through the list of files and include each PHP file.
    foreach ( $iterator as $file ) {
        if ( $file->isFile() && $file->getExtension() === 'php' ) {
            require_once $file->getPathname(); // Include each PHP file.
        }
    }
}

// Get the directory path and include PHP files.
$dir_path = get_template_directory() . '/blocks/core';
design_system_include_block_style_variations( $dir_path );
