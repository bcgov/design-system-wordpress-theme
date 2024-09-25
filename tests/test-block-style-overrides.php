<?php
/**
 * Class BlockStyleRegistrationTest
 *
 * @package Design_System_Wordpress_Theme
 */
class BlockStyleRegistrationTest extends WP_UnitTestCase {

    /**
     * Test that the navigation block style is registered.
     */
    public function test_navigation_register() {
        // Define the block name and style name to test.
        $block_name       = 'core/navigation';
        $block_style_name = 'wp-block-navigation-separator';

        // Get the instance of the WP_Block_Styles_Registry.
        $registry = WP_Block_Styles_Registry::get_instance();

        // Check if the block style is registered.
        $registered_style = $registry->is_registered( $block_name, $block_style_name );

        // Assert that the block style is registered.
        $this->assertTrue( $registered_style );
    }
}
