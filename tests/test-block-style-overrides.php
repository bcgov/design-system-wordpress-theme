<?php
/**
 * Class BlockStyleRegistrationTest
 *
 * @package Design_System_Wordpress_Theme
 */
class BlockStyleRegistrationTest extends WP_UnitTestCase {
	/**
     * Tests if the navigation block style is registered.
     *
     * This test case checks if the 'wp-block-navigation-separator' style is registered for the 'core/navigation' block.
     */
    public function test_navigation_register() {

        $block_name       = 'core/navigation';
        $block_style_name = 'wp-block-navigation-separator';

        $registry         = WP_Block_Styles_Registry::get_instance();
        $registered_style = $registry->is_registered( $block_name, $block_style_name );

        $this->assertTrue( $registered_style );
    }
}
