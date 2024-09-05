<?php
/**
 * Enqueues the design system CSS stylesheet on the frontend of the WordPress site.
 *
 * This function uses the `wp_enqueue_style` function to load the `index.css` file from the `dist/styles` directory
 * within the current theme directory.
 *
 * @since 1.3.0
 */
function design_system_public_enqueue_global_styles() {
    $version = filemtime( get_template_directory() . '/dist/index.css' );
    wp_enqueue_style( 'design-system-styles', get_template_directory_uri() . '/dist/index.css', array(), $version );
}

add_action( 'enqueue_block_assets', 'design_system_public_enqueue_global_styles' );


/**
 * Registers block pattern categories for the Design System theme.
 * This function checks if the register_block_pattern_category_type function exists,
 * then registers a custom block pattern category type. It also defines an array of
 * block pattern categories and applies a filter to allow other plugins or themes to
 * modify the block pattern categories. Finally, it registers each block pattern category.
 *
 * @since 0.8.0
 */
function design_system_register_block_patterns() {

	if ( function_exists( 'register_block_pattern_category_type' ) ) {
		register_block_pattern_category_type(
			'bc-gov-logo-light',
			array(
				'label' => __( 'Design System Theme', 'bc-gov-logo-light' ),
			)
		);
	}

	$block_pattern_categories = array(
		'bc-gov-logo-light' => array(
			'label'         => __( 'logo', 'bc-gov-logo-light' ),
			'categoryTypes' => array( 'bc-gov-logo-light' ),
		),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since 0.8.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'design_system_theme_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}
}
add_action( 'init', 'design_system_register_block_patterns' );
