<?php
/**
 * Adds external-link icon classes to rendered block anchors.
 *
 * @package Design_System_WordPress_Theme
 */

namespace Bcgov\Theme\DesignSystem;

/**
 * Marks external links in rendered block HTML.
 */
class ExternalLinkIcons {

    /**
     * Register hooks.
     *
     * @return void
     */
    public function init() {
        \add_filter( 'render_block', array( $this, 'mark_external_links_in_rendered_blocks' ), 10, 1 );
    }

    /**
     * Mark external links in rendered block content on the frontend.
     *
     * @param string $block_content Rendered block HTML.
     *
     * @return string
     */
    public function mark_external_links_in_rendered_blocks( $block_content ) {
        if ( ! is_string( $block_content ) || '' === $block_content ) {
            return $block_content;
        }

        return $this->add_external_icon_class_to_html( $block_content );
    }

    /**
     * Add external-link icon class to anchors in rendered block HTML.
     *
     * @param string $html Block HTML.
     *
     * @return string
     */
    private function add_external_icon_class_to_html( $html ) {
        if ( false === stripos( $html, '<a ' ) ) {
            return $html;
        }

        if ( ! class_exists( 'WP_HTML_Tag_Processor' ) ) {
            return $html;
        }

        $processor = new \WP_HTML_Tag_Processor( $html );
        while ( $processor->next_tag( array( 'tag_name' => 'A' ) ) ) {
            $href = (string) $processor->get_attribute( 'href' );
            if ( $this->is_external_href( $href ) ) {
                $processor->add_class( 'dswp-external-link-icon' );
            }
        }

        return $processor->get_updated_html();
    }

    /**
     * Determine whether a URL is external to the current site.
     *
     * @param string $href Link URL.
     *
     * @return bool
     */
    private function is_external_href( $href ) {
        $href = trim( (string) $href );
        if ( '' === $href ) {
            return false;
        }

        // Ignore in-page and non-HTTP(S) links.
        if (
            0 === strpos( $href, '#' ) ||
            0 === strpos( $href, 'mailto:' ) ||
            0 === strpos( $href, 'tel:' ) ||
            0 === strpos( $href, 'sms:' ) ||
            0 === strpos( $href, 'javascript:' )
        ) {
            return false;
        }

        $link_host = \wp_parse_url( $href, PHP_URL_HOST );
        if ( empty( $link_host ) ) {
            // Relative URLs are internal.
            return false;
        }

        $site_host = \wp_parse_url( \home_url(), PHP_URL_HOST );
        if ( empty( $site_host ) ) {
            return false;
        }

        return $this->normalize_host( $link_host ) !== $this->normalize_host( $site_host );
    }

    /**
     * Normalize host names for external-link checks.
     *
     * @param string $host Hostname to normalize.
     *
     * @return string
     */
    private function normalize_host( $host ) {
        $host = strtolower( (string) $host );
        return preg_replace( '/^www\./', '', $host );
    }
}
