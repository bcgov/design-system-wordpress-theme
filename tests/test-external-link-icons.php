<?php
/**
 * Tests for external link icon class injection.
 *
 * @package Design_System_WordPress_Theme
 */

use Bcgov\Theme\DesignSystem\ExternalLinkIcons;

/**
 * Class ExternalLinkIconsTest
 */
class ExternalLinkIconsTest extends WP_UnitTestCase {

    /**
     * External links receive the icon class.
     */
    public function test_external_link_gets_icon_class() {
        $service = new ExternalLinkIcons();
        $html    = '<p><a href="https://google.ca">External</a></p>';

        $updated_html = $service->mark_external_links_in_rendered_blocks( $html );

        $this->assertStringContainsString( 'dswp-external-link-icon', $updated_html );
    }

    /**
     * Internal and relative links do not receive the icon class.
     */
    public function test_internal_links_do_not_get_icon_class() {
        $service   = new ExternalLinkIcons();
        $home_host = wp_parse_url( home_url(), PHP_URL_HOST );
        $html      = sprintf(
            '<p><a href="https://%1$s/page">Absolute internal</a> <a href="/relative-path">Relative internal</a></p>',
            esc_attr( $home_host )
        );

        $updated_html = $service->mark_external_links_in_rendered_blocks( $html );

        $this->assertStringNotContainsString( 'dswp-external-link-icon', $updated_html );
    }

    /**
     * Existing classes are preserved when icon class is added.
     */
    public function test_existing_anchor_classes_are_preserved() {
        $service = new ExternalLinkIcons();
        $html    = '<p><a class="custom-link" href="https://google.ca">External</a></p>';

        $updated_html = $service->mark_external_links_in_rendered_blocks( $html );

        $this->assertStringContainsString( 'custom-link', $updated_html );
        $this->assertStringContainsString( 'dswp-external-link-icon', $updated_html );
    }
}
