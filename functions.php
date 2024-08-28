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
add_action( 'wp_enqueue_scripts', 'design_system_public_enqueue_global_styles' );
