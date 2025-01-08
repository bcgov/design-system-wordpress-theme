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
function design_system_restrict_locking_unlocking_blocks( $settings ) {
    $settings['canLockBlocks'] = current_user_can( 'activate_plugins' );
    return $settings;
}
add_filter( 'block_editor_settings_all', 'design_system_restrict_locking_unlocking_blocks', 10, 2 );


/**
 * Disables the default patterns from WordPress.
 */
function design_system_disable_default_block_patterns() {
    remove_theme_support( 'core-block-patterns' );
}
add_action( 'init', 'design_system_disable_default_block_patterns' );


/**
 * Combines any child theme's color palette with the Design System Theme Color palette.
 *
 * @param object $theme_json The theme.json schema.
 */
function design_system_combine_parent_child_theme_json( $theme_json ) {
    $theme_json_data = $theme_json->get_data();

    $theme_title = $theme_json_data['title'];

    // If the theme_json_data is from the design system theme, this is not a child theme so exit without change.
    if ( 'Design System WordPress Theme' === $theme_title ) {
        return $theme_json;
    }
    // Get the parent theme.
    $theme = wp_get_theme( 'design-system-wordpress-theme' );

    // Get the path to the theme.json file using the theme's stylesheet.
    $theme_json_path = $theme->get_theme_root() . '/' . $theme->get_stylesheet() . '/theme.json';

    // Initialize parent palette.
    $parent_palette = array();

    // Check if the theme.json file exists and read it.
    if ( file_exists( $theme_json_path ) ) {  //TODO Improve the way you get the file contents.
        $parent_theme_json_content = implode( '', file( $theme_json_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ) );
        $parent_theme_json_data    = json_decode( $parent_theme_json_content, true );

        // Check if the parent theme has a color palette.
        if ( isset( $parent_theme_json_data['settings']['color']['palette'] ) && is_array( $parent_theme_json_data['settings']['color']['palette'] ) ) {
            $parent_palette = $parent_theme_json_data['settings']['color']['palette'];
        }
    }
    // Initialize child palette.
    $child_palette = array();

    // Check if the child theme has its own color palette.
    if ( isset( $theme_json_data['settings']['color']['palette'] ) && is_array( $theme_json_data['settings']['color']['palette'] ) ) {
        $child_palette = $theme_json_data['settings']['color']['palette'];
    }

    // Merge the parent palette with the child palette.
    $merged_palette = array_merge( $parent_palette, $child_palette['theme'] );

    // Prepare the new data with the validated palette.
    $new_data = array(
        'version'  => 3, // Ensure the version matches the latest.
        'settings' => array(
            'color' => array(
                'palette' => $merged_palette, // Use the validated palette.
            ),
        ),
    );

    // Update the theme JSON with the new data.
    return $theme_json->update_with( $new_data );
}
add_filter( 'wp_theme_json_data_theme', 'design_system_combine_parent_child_theme_json' );
