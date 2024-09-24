<?php
/**
 * Class SampleTest2
 *
 * @package Design_System_Wordpress_Theme
 */

/**
 * Sample test case.
 */

 
class SampleTest2 extends WP_UnitTestCase {

    public static function set_up_before_class() {
        parent::set_up_before_class();
        include '/blocks/core/style-overrides/navigation.php';
    }

   public function test_navigation_register() {
        $registry = new WP_Block_Styles_Registry();
        print_r($registry->get_all_registered());
        $is_style_registered = $registry->is_registered( 'core/navigation','wp-block-navigation-separator' );  
        $this->assertTrue( $is_style_registered );
	}
}
