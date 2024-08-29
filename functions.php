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


function bcgov_block_theme_enqueue_admin_scripts(): void {
  $admin_assets_path = get_template_directory() . '/dist/index.asset.php';
  $admin_assets      = require_once $admin_assets_path;
  $admin_version     = $admin_assets['version'] ?? wp_get_theme()->get( 'Version' );

  wp_enqueue_script(
    'bcgov-block-theme-admin',
    get_template_directory_uri() . '/dist/index.js',
    $admin_assets['dependencies'] ?? [],
    $admin_version,
    true
  );

  // $javascript_variables = $this->set_javascript_variables();

  // wp_localize_script( 'bcgov-block-theme-admin', 'site', $javascript_variables );

  // wp_localize_script(
  //   'bcgov-blocks-manager',
  //   'postData',
  //   [
  //     'postType' => get_post_type( get_the_id() ),
  //     'postId'   => get_the_id(),
  //   ]
  // );

  wp_enqueue_style(
    'bcgov-block-theme-admin',
    get_template_directory_uri() . '/dist/index.css',
    [],
    $admin_version
  );
}

add_action( 'admin_enqueue_scripts', 'bcgov_block_theme_enqueue_admin_scripts' );

add_action( 'wp_enqueue_scripts', 'design_system_public_enqueue_global_styles' );
// add_action('after_setup_theme', 'design_system_public_enqueue_global_styles');

// Add the new code here
add_filter( 'wpex_typography_settings', function( $settings ) {
  if ( isset( $settings['entry_h1'] ) ) {
    $settings['entry_h1']['target'] = 'h1, .wpex-h1, .vcex-module h1, h1.vcex-heading';
  }
  if ( isset( $settings['entry_h2'] ) ) {
    $settings['entry_h2']['target'] = 'h2, .wpex-h2, .vcex-module h2, h2.vcex-heading';
  }
  if ( isset( $settings['entry_h3'] ) ) {
    $settings['entry_h3']['target'] = 'h3, .wpex-h3, .vcex-module h3, h3.vcex-heading';
  }
  if ( isset( $settings['entry_h4'] ) ) {
    $settings['entry_h4']['target'] = 'h4, .wpex-h4, .vcex-module h4, h4.vcex-heading';
  }
  return $settings;
} );