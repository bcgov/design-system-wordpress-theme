<?php
/**
 * Registers the navigation block styles.
 *
 * @since 1.3.0
 */
function design_system_register_navigation_block_styles() {
    $block_name       = 'core/navigation';
    $style_properties = array(
        'name'         => 'wp-block-navigation-separator',
        'label'        => __( 'Separator' ),
        'isDefault'    => false,
        'categories'   => [ 'footer' ],
        'style_handle' => 'design-system-styles',
    );
    register_block_style( $block_name, $style_properties );
}
add_action( 'init', 'design_system_register_navigation_block_styles' );
