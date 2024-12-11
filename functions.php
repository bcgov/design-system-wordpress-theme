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
add_action( 'admin_enqueue_scripts', 'design_system_public_enqueue_global_styles' );
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
    $block_style_variation_files = [ 'navigation', 'heading' ];

    // Include specified block style variation files.
    foreach ( glob( $dir_path . '/*.php' ) as $file ) {
        $base_name = basename( $file, '.php' );
        if ( in_array( $base_name, $block_style_variation_files, true ) && ! class_exists( $base_name ) ) {
            require_once $file;
        }
    }

    // Recursively include from subdirectories.
    foreach ( glob( $dir_path . '/*', GLOB_ONLYDIR ) as $dir ) {
        design_system_include_block_style_variations( $dir );
    }
}

// Set the directory path and include block style variations.
$dir_path = get_template_directory() . '/blocks/core/style-variations';
design_system_include_block_style_variations( $dir_path );


/**
 * Restrict access to the locking UI to Administrators.
 *
 * @param array $settings Default editor settings.
 */
function dswp_restrict_locking_unlocking_blocks( $settings ) {
    $settings['canLockBlocks'] = current_user_can( 'activate_plugins' );
	return $settings;
}
add_filter( 'block_editor_settings_all', 'dswp_restrict_locking_unlocking_blocks', 10, 2 );
