<?php
/**
 * Design System Plugin dependency: auto-activate on theme switch, allow admins to disable, show notice when inactive.
 *
 * @package Design_System_WordPress_Theme
 */

/**
 * Plugin path (relative to wp-content/plugins) required by this theme.
 *
 * @return string Plugin basename path.
 */
function design_system_wordpress_theme_required_plugin() {
	return 'design-system-wordpress-plugin/design-system-wordpress-plugin.php';
}

add_action( 'after_switch_theme', 'design_system_theme_activate_plugin_on_switch', 10, 2 );
add_action( 'after_setup_theme', 'design_system_theme_register_plugin_required_notices', 5 );

/**
 * Auto-activate plugin when this theme is switched to; admins can disable it later.
 *
 * @param string   $old_name  Previous theme name.
 * @param WP_Theme $old_theme WP_Theme instance of the old theme (the one that was active before the switch).
 */
function design_system_theme_activate_plugin_on_switch( $old_name, $old_theme ) {
	$new_theme = wp_get_theme( get_stylesheet() );
	if ( 'design-system-wordpress-theme' !== $new_theme->get_template() ) {
		return;
	}
	$plugin = design_system_wordpress_theme_required_plugin();
	$path   = WP_PLUGIN_DIR . '/' . $plugin;
	if ( ! file_exists( $path ) ) {
		return;
	}
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( ! is_plugin_active( $plugin ) ) {
		activate_plugin( $plugin, '', false, true );
	}
}

/** Register admin notice and frontend banner when plugin is inactive. */
function design_system_theme_register_plugin_required_notices() {
	if ( function_exists( 'design_system_register_blocks' ) ) {
		return;
	}
	add_action(
        'admin_notices',
        function () {
			design_system_theme_plugin_required_notice( 'admin' );
		}
    );
	add_action(
        'wp_body_open',
        function () {
			design_system_theme_plugin_required_notice( 'front' );
		},
        1
    );
}

/**
 * Outputs the "plugin required" notice in admin or frontend.
 *
 * @param string $context Either 'admin' or 'front'.
 */
function design_system_theme_plugin_required_notice( $context ) {
	if ( function_exists( 'design_system_register_blocks' ) ) {
		return;
	}
	$msg = __( 'This theme will not work correctly without the Design System Plugin. Please enable it.', 'design-system-wordpress-theme' );
	if ( 'admin' === $context ) {
		echo '<div class="notice notice-warning is-dismissible"><p><strong>' . esc_html__( 'Design System Theme', 'design-system-wordpress-theme' ) . ':</strong> ' . esc_html( $msg );
		if ( current_user_can( 'activate_plugins' ) ) {
			echo ' <a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">' . esc_html__( 'Go to Plugins', 'design-system-wordpress-theme' ) . '</a>';
		}
		echo '</p></div>';
	} else {
		echo '<div class="design-system-theme-plugin-required-banner" role="alert">' . esc_html( $msg . ' ' . __( 'Enable it in the WordPress admin.', 'design-system-wordpress-theme' ) ) . '</div>';
	}
}

/**
 * Enqueues the design system CSS stylesheet on the frontend of the WordPress site.
 *
 * @since 1.3.0
 */
function design_system_public_enqueue_global_styles() {
	$version = filemtime( get_template_directory() . '/dist/index.css' );
	wp_enqueue_style( 'design-system-styles', get_template_directory_uri() . '/dist/index.css', array(), $version );
	wp_enqueue_style( 'design-system-theme', get_stylesheet_uri(), array( 'design-system-styles' ), filemtime( get_stylesheet_directory() . '/style.css' ) );
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

    // If the theme_json_data is from the design system theme, this is not a child theme so exit without change.
    if ( ! is_child_theme() ) {
        return $theme_json;
    }
    // Get the parent theme.
    $theme = wp_get_theme( 'design-system-wordpress-theme' );

    // Get the path to the theme.json file using the theme's stylesheet.
    $theme_json_path = $theme->get_theme_root() . '/' . $theme->get_stylesheet() . '/theme.json';

    // Initialize parent palette.
    $parent_palette = array();

    // Check if the theme.json file exists and read it.

    if ( file_exists( $theme_json_path ) ) {
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

/**
 * Add excerpt support to pages.
 */
add_post_type_support( 'page', 'excerpt' );


// WordPress Design System Theme
// This is the fallback (default), and is used to bring in the template part `search.html`.
add_action( 'init', 'design_system_register_templates', 1 );
/**
 * Registers the Design System Theme search template.
 *
 * This is the fallback (default) template used to bring in the template part `search.html`.
 */
function design_system_register_templates() {
	register_block_template(
		'design-system-wordpress-theme//search-content',
		[
			'title'       => 'Design System Theme Search Template',
			'description' => 'Search results',
			'content'     => '<!-- wp:template-part {"slug":"search","area":"uncategorized"} /-->',
		],
	);
}
