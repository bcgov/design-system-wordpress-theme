<?php
/**
 * Register archived legacy patterns only when explicitly enabled.
 *
 * @package Design_System_WordPress_Theme
 */

namespace Bcgov\Theme\DesignSystem;

/**
 * Conditionally registers archived block patterns.
 *
 * Archived patterns live in `patterns/archive/` so they don't appear by default.
 * They are only registered when enabled via the `dswp_legacy_pattern_allow` filter.
 *
 * @package Design_System_WordPress_Theme
 */
class LegacyPatterns {

    /**
     * Initialize legacy pattern behavior.
     *
     * @return void
     */
    public function init() {
        \add_action( 'init', array( $this, 'control_legacy_patterns' ), 110 );
    }

    /**
     * Register or hide archived legacy patterns depending on site access.
     *
     * @return void
     */
    public function control_legacy_patterns() {
        $pattern_files = \glob( \get_template_directory() . '/patterns/archive/*.php' );
        if ( ! is_array( $pattern_files ) || empty( $pattern_files ) ) {
            return;
        }

        $show_legacy_patterns = $this->can_show_legacy_patterns();
        if ( ! $show_legacy_patterns ) {
            return;
        }

        if ( ! \WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( 'dswp-archive' ) ) {
            \register_block_pattern_category(
                'dswp-archive',
                array(
                    'label' => \__( 'Archive', 'design-system-wordpress-theme' ),
                )
            );
        }

        foreach ( $pattern_files as $file_path ) {
            $headers = \get_file_data(
                $file_path,
                array(
                    'title'          => 'Title',
                    'slug'           => 'Slug',
                    'description'    => 'Description',
                    'keywords'       => 'Keywords',
                    'block_types'    => 'Block Types',
                    'post_types'     => 'Post Types',
                    'inserter'       => 'Inserter',
                    'viewport_width' => 'Viewport Width',
                )
            );

            $slug  = isset( $headers['slug'] ) ? trim( $headers['slug'] ) : '';
            $title = isset( $headers['title'] ) ? trim( $headers['title'] ) : '';
            if ( '' === $slug ) {
                continue;
            }

            if ( '' === $title ) {
                continue;
            }

            ob_start();
            include $file_path;
            $content = trim( (string) ob_get_clean() );
            if ( '' === $content ) {
                continue;
            }

            $properties = array(
                'title'      => $title,
                'content'    => $content,
                'categories' => array( 'dswp-archive' ),
            );

            if ( ! empty( $headers['description'] ) ) {
                $properties['description'] = trim( $headers['description'] );
            }
            if ( ! empty( $headers['keywords'] ) ) {
                $properties['keywords'] = array_values( array_filter( array_map( 'trim', explode( ',', $headers['keywords'] ) ) ) );
            }
            if ( ! empty( $headers['block_types'] ) ) {
                $properties['blockTypes'] = array_values( array_filter( array_map( 'trim', explode( ',', $headers['block_types'] ) ) ) );
            }
            if ( ! empty( $headers['post_types'] ) ) {
                $properties['postTypes'] = array_values( array_filter( array_map( 'trim', explode( ',', $headers['post_types'] ) ) ) );
            }
            if ( ! empty( $headers['viewport_width'] ) ) {
                $properties['viewportWidth'] = (int) trim( $headers['viewport_width'] );
            }
            if ( ! empty( $headers['inserter'] ) ) {
                $inserter_value         = strtolower( trim( $headers['inserter'] ) );
                $properties['inserter'] = ! in_array( $inserter_value, array( 'no', 'false', '0' ), true );
            }

            $this->unregister_pattern_if_registered( $slug );
            \register_block_pattern( $slug, $properties );
        }
    }

    /**
     * Safely unregister a pattern when it is registered.
     *
     * @param string $slug Pattern slug.
     *
     * @return void
     */
    private function unregister_pattern_if_registered( $slug ) {
        $registry = \WP_Block_Patterns_Registry::get_instance();
        if ( $registry->is_registered( $slug ) ) {
            \unregister_block_pattern( $slug );
        }
    }

    /**
     * Check whether this request can access legacy archived patterns.
     *
     * @return bool
     */
    private function can_show_legacy_patterns() {
        return (bool) \apply_filters( 'dswp_legacy_pattern_allow', false );
    }
}
