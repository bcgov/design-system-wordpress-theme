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
        'design-system-scripts',
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
    // Define the block style variation files.
    $block_style_variation_files = [ 'navigation' ]; // Added missing semicolon.

    // Check if directory exists and is readable.
    if ( ! is_dir( $dir_path ) || ! is_readable( $dir_path ) ) {
        return new WP_Error( 'dir_not_readable', 'Directory not readable: ' . $dir_path );
    }

    // Include specified block style variation files.
    foreach ( glob( $dir_path . '/*.php' ) as $file ) {
        $baseName = basename( $file, '.php' );
        if ( in_array( $baseName, $block_style_variation_files, true ) && ! class_exists( $baseName ) ) {
            require_once $file;
        }
    }

    // Recursively include from subdirectories.
    foreach ( glob( $dir_path . '/*', GLOB_ONLYDIR ) as $dir ) {
        design_system_include_block_style_variations( $dir ); // Removed the extra parameter.
    }
}

// Set the directory path and include block style variations.
$dir_path = get_template_directory() . '/blocks/core';
design_system_include_block_style_variations( $dir_path );
