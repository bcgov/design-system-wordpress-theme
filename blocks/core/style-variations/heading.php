<?php
/**
 * Registers the heading block styles.
 *
 * @since 1.3.0
 */
function design_system_register_heading_block_styles() {
    $block_name       = 'core/heading';
    $style_properties = array(
        'name'         => 'heading-callout',
        'label'        => __( 'Design System Callout' ),
        'isDefault'    => false,
        'style_handle' => 'design-system-styles',
    );
    register_block_style( $block_name, $style_properties );
}

add_action( 'init', 'design_system_register_heading_block_styles' );
