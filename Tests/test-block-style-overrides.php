<?php
/**
 * Class BlockStyleRegistrationTest
 *
 * @package Design_System_Wordpress_Theme
 */

class BlockStyleRegistrationTest extends WP_UnitTestCase
{
    public function test_navigation_register()
    {
        
        $block_name = 'core/navigation'; // Replace with the block type name including namespace
        $block_style_name = 'wp-block-navigation-separator'; // Replace with the block style name

        $registry = WP_Block_Styles_Registry::get_instance();
        $registered_style = $registry->is_registered($block_name, $block_style_name);

        $this->assertTrue($registered_style);
    }
}