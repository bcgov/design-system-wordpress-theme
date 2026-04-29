<?php
/**
 * Design System Plugin dependency: auto-activate on theme switch, allow admins to disable, show notice when inactive.
 *
 * @package Design_System_WordPress_Theme
 */

use Bcgov\Theme\DesignSystem\LegacyPatterns;

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
 * Composer autoload.
 */
$autoloader_path = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $autoloader_path ) ) {
    require_once $autoloader_path;
}

/**
 * Legacy patterns.
 */
if ( class_exists( 'Bcgov\\Theme\\DesignSystem\\LegacyPatterns' ) ) {
    $legacy_patterns = new LegacyPatterns();
    $legacy_patterns->init();
}

/**
 * Auto-activate plugin when this theme is switched to; admins can disable it later.
 */
function design_system_theme_activate_plugin_on_switch() {
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

/** Register admin notice when plugin is inactive. */
function design_system_theme_register_plugin_required_notices() {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    if ( is_plugin_active( design_system_wordpress_theme_required_plugin() ) ) {
        return;
    }
    add_action( 'admin_notices', 'design_system_theme_plugin_required_notice' );
}

/** Outputs the "plugin required" notice in the admin. */
function design_system_theme_plugin_required_notice() {
    $msg = __( 'This theme will not work correctly without the Design System Plugin. Please enable it.', 'design-system-wordpress-theme' );
    echo '<div class="notice notice-warning is-dismissible"><p><strong>' . esc_html__( 'Design System Theme', 'design-system-wordpress-theme' ) . ':</strong> ' . esc_html( $msg );
    if ( current_user_can( 'activate_plugins' ) ) {
        echo ' <a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">' . esc_html__( 'Go to Plugins', 'design-system-wordpress-theme' ) . '</a>';
    }
    echo '</p></div>';
}

/**
 * Enqueues the design system CSS stylesheet on the frontend of the WordPress site.
 *
 * @since 1.3.0
 */
function design_system_public_enqueue_global_styles() {
    $asset_file = get_template_directory() . '/dist/index.asset.php';
    $version    = file_exists( $asset_file ) ? ( include $asset_file )['version'] : filemtime( get_template_directory() . '/dist/index.css' );
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
 * Registers the post title block styles (e.g. Underline).
 *
 * @since 1.3.0
 */
function design_system_register_post_title_block_styles() {
    $block_name       = 'core/post-title';
    $style_properties = array(
        'name'         => 'underline-title',
        'label'        => __( 'Underline' ),
        'isDefault'    => false,
        'style_handle' => 'design-system-styles',
    );
    register_block_style( $block_name, $style_properties );
}
add_action( 'init', 'design_system_register_post_title_block_styles' );

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
 * Enable appearance tools for super admins only.
 *
 * @param WP_Theme_JSON_Data $theme_json Theme JSON data object.
 *
 * @return WP_Theme_JSON_Data
 */
function design_system_enable_appearance_tools_for_super_admins( $theme_json ) {
    if ( ! is_super_admin() ) {
        return $theme_json;
    }

    return $theme_json->update_with(
        array(
            'version'  => 3,
            'settings' => array(
                'appearanceTools' => true,
            ),
        )
    );
}
add_filter( 'wp_theme_json_data_theme', 'design_system_enable_appearance_tools_for_super_admins', 20 );

/**
 * Add excerpt support to pages.
 */
add_post_type_support( 'page', 'excerpt' );
add_filter( 'get_block_type_variations', 'custom_cover_variation', 10, 2 );

/**
 * Adds a custom variation for the core/cover block.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/#registering-block-variations
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/#block-variation-attributes
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/#block-variation-template
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-variations/#setting-a-default-block-variation
 *
 * @param array         $variations Existing block variations.
 * @param WP_Block_Type $block_type Block type being filtered.
 * @return array Modified block variations.
 */
function custom_cover_variation( $variations, $block_type ) {
    // Only modify variations for the cover block.
    if ( 'core/cover' !== $block_type->name ) {
        return $variations;
    }

    // Add a custom variation.
    $variations[] = [
        'name'        => 'hero-image',
        'title'       => __( 'Hero Image (16:9)', 'design-system-wordpress-theme' ),
        'description' => __( 'Use a 16:9 (HD) image, e.g. 1920x1080, for best results.', 'design-system-wordpress-theme' ),
        'isActive'    => [ 'minHeight' ],
        'scope'       => [ 'inserter' ],
        'isDefault'   => false,
        'attributes'  => [
            'metadata'     => [
                'name' => 'Hero image',
            ],
            'layout'       => [
                'type' => 'constrained',
            ],
            'templateLock' => 'contentOnly',
            'isDark'       => true,
        ],
        'icon'        => 'cover-image',
        'innerBlocks' => [
            // This group sets up a centered layout for the content and adds a name to the block for easier identification in the editor.
            [
                'core/group',
                [
                    'metadata' => [
                        'name' => 'Layout Container to center content and set width',
                    ],
                    'layout'   => [
                        'type'           => 'constrained',
                        'contentSize'    => '468px',
                        'justifyContent' => 'left',
                    ],
                ],
                [
                    // This group is used to create a colored background behind the title, description, and action button.
                    [
                        'core/group',
                        [
                            'metadata' => [
                                'name' => 'Card Container',
                            ],
                            'style'    => [
                                'color'   => [
                                    'background' => ' #013366B2', // dswp-surface-color-background-dark-blue, but with 70% opacity.
                                    'text'       => 'var:preset|color|white',
                                ],
                                'border'  => [
                                    'left'   => [
                                        'width' => '0.5rem',
                                        'color' => 'var:preset|color|accent-primary',
                                        'style' => 'solid',
                                    ],
                                    'radius' => '4px',
                                ],
                                'spacing' => [
                                    'padding' => [
                                        'top'    => '0.5rem',
                                        'right'  => '2rem',
                                        'bottom' => '1rem',
                                        'left'   => '2rem',
                                    ],
                                ],
                            ],
                        ],
                        [
                            [
                                // a Title block to use the post title directly, but could also be a Heading block if you want to type in a custom title instead of using the post title.
                                'core/post-title',
                                [
                                    'metadata'    => [
                                        'name' => 'Title',
                                    ],
                                    'placeholder' => 'Title',
                                    'level'       => 1,
                                    'style'       => [
                                        'spacing' => [
                                            'padding' => [
                                                'top'    => '1.5rem',
                                                'bottom' => '1.5rem',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                // An optional description block.
                                'core/paragraph',
                                [
                                    'metadata'    => [
                                        'name' => '(optional) Description',
                                    ],
                                    'placeholder' => 'Description (optional):' . "\n" . '1–2 short sentences,  20–40 words total.' . "\n" . '120–200 characters is a very safe target.',
                                    'style'       => [
                                        'spacing'    => [
                                            'padding' => [
                                                'bottom' => '1rem',
                                            ],
                                        ],
                                        'typography' => [
                                            'fontSize'   => '1.125rem',
                                            'lineHeight' => '1.7',
                                        ],

                                    ],
                                ],
                            ],
                            [
                                'core/buttons',
                                [],
                                [
                                    [
                                        'core/button',
                                        [
                                            'className'   => 'is-style-link',
                                            'placeholder' => 'Action >',
                                            'metadata'    => [
                                                'name' => '(optinal) Call to Action Button',
                                            ],
                                            'style'       => [
                                                'spacing' => [
                                                    'padding'  => [
                                                        'top'    => 0,
                                                        'right'  => '1.5rem',
                                                        'bottom' => '1rem',
                                                        'left'   => 0,
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    return $variations;
}

/**
 * Register link block style for button.
 *
 * @return void
 */
function custom_register_block_styles() {
    // Use the Link button style from the DSWP theme.
    register_block_style(
        'core/button',
        [
            'name'         => 'link',
            'label'        => __( 'Link', 'themeslug' ),
            'inline_style' => '.wp-block-button.is-style-link > * {
                background: none;
                border: none;
                padding: 0;
                font: inherit;
                cursor: pointer;
                outline: inherit;
                text-decoration: underline;
		    }',
        ]
    );
}

add_action( 'init', 'custom_register_block_styles' );
