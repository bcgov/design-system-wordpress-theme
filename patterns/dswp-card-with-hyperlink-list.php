<?php
/**
 * Title: DSWP Card with Hyperlink List
 * Slug: design-system-wordpress-theme/dswp-card-with-hyperlinks-list
 * Categories: call-to-action
 *
 * @package Design-System-WordPress-Theme
 */
?>

<!-- wp:group {"metadata":{"name":"DSWP Card with Hyperlink List","categories":["call-to-action"],"patternName":"design-system-wordpress-theme/dswp-card-with-hyperlinks-list"},"className":"alignfull","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"layout":{"type":"default"}} -->
    <div class="wp-block-group"><!-- wp:columns {"align":"wide","className":" dswp-card-list","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|50"},"padding":{"right":"0","left":"0"}}}} -->
        <div class="wp-block-columns alignwide dswp-card-list" style="padding-right:0;padding-left:0"><!-- wp:column {"width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0rem","right":"0rem"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
            <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--30);padding-right:0rem;padding-bottom:var(--wp--preset--spacing--30);padding-left:0rem"><!-- wp:group {"align":"full","className":"dswp-card","style":{"spacing":{"padding":{"right":"0","left":"0","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"111px","justifyContent":"left","wideSize":""}} -->
                <div class="wp-block-group alignfull dswp-card" style="padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","className":"dswp-card-header","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull dswp-card-header" style="padding-right:0;padding-left:0"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                        <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"textColor":"font dark","fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-text-align-left has-font-dark-color has-text-color has-link-color has-medium-font-size" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">Lorem ipsum dolor sit</h3>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"metadata":{"name":"Separator"},"align":"full","className":"dswp-card-divider","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"color":"var:preset|color|border-dark","width":"12px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull dswp-card-divider" style="border-top-color:var(--wp--preset--color--border-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-bottom:0"></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","className":"dswp-card-content","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull dswp-card-content" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"},"padding":{"right":"0","left":"0"}},"typography":{"lineHeight":"1.7"},"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark"} -->
                        <p class="has-text-align-left has-font-dark-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:var(--wp--preset--spacing--40);margin-left:0;padding-right:0;padding-left:0;line-height:1.7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie a mi eu dictum. Sed eget dictum massaLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie a mi eu dictum. Sed eget dictum massa</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:list {"className":"wp-block-list","style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
                        <ul style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->

                            <!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->

                            <!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->
                        </ul>
                        <!-- /wp:list -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:buttons {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
                        <div class="wp-block-buttons alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"font dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}}} -->
                            <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-font-dark-color has-text-color has-link-color wp-element-button">Lorem</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0rem","right":"0rem"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
            <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--30);padding-right:0rem;padding-bottom:var(--wp--preset--spacing--30);padding-left:0rem"><!-- wp:group {"align":"full","className":"dswp-card","style":{"spacing":{"padding":{"right":"0","left":"0","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"111px","justifyContent":"left","wideSize":""}} -->
                <div class="wp-block-group alignfull dswp-card" style="padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","className":"dswp-card-header","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull dswp-card-header" style="padding-right:0;padding-left:0"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                        <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"textColor":"font dark","fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-text-align-left has-font-dark-color has-text-color has-link-color has-medium-font-size" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">Lorem ipsum dolor sit</h3>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"metadata":{"name":"Separator"},"align":"full","className":"dswp-card-divider","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"color":"var:preset|color|border-dark","width":"12px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull dswp-card-divider" style="border-top-color:var(--wp--preset--color--border-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-bottom:0"></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","className":"dswp-card-content","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull dswp-card-content" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"},"padding":{"right":"0","left":"0"}},"typography":{"lineHeight":"1.7"},"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark"} -->
                        <p class="has-text-align-left has-font-dark-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:var(--wp--preset--spacing--40);margin-left:0;padding-right:0;padding-left:0;line-height:1.7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie a mi eu dictum. Sed eget dictum massaLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie a mi eu dictum. Sed eget dictum massa</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:list {"className":"wp-block-list","style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
                        <ul style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->

                            <!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->

                            <!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->
                        </ul>
                        <!-- /wp:list -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:buttons {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
                        <div class="wp-block-buttons alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"font dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}}} -->
                            <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-font-dark-color has-text-color has-link-color wp-element-button">Lorem</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0rem","right":"0rem"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
            <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--30);padding-right:0rem;padding-bottom:var(--wp--preset--spacing--30);padding-left:0rem"><!-- wp:group {"align":"full","className":"dswp-card","style":{"spacing":{"padding":{"right":"0","left":"0","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"111px","justifyContent":"left","wideSize":""}} -->
                <div class="wp-block-group alignfull dswp-card" style="padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","className":"dswp-card-header","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull dswp-card-header" style="padding-right:0;padding-left:0"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                        <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"textColor":"font dark","fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-text-align-left has-font-dark-color has-text-color has-link-color has-medium-font-size" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">Lorem ipsum dolor sit</h3>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"metadata":{"name":"Separator"},"align":"full","className":"dswp-card-divider","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"color":"var:preset|color|border-dark","width":"12px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull dswp-card-divider" style="border-top-color:var(--wp--preset--color--border-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-bottom:0"></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","className":"dswp-card-content","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull dswp-card-content" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"},"padding":{"right":"0","left":"0"}},"typography":{"lineHeight":"1.7"},"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark"} -->
                        <p class="has-text-align-left has-font-dark-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:var(--wp--preset--spacing--40);margin-left:0;padding-right:0;padding-left:0;line-height:1.7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie a mi eu dictum. Sed eget dictum massaLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie a mi eu dictum. Sed eget dictum massa</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:list {"className":"wp-block-list","style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
                        <ul style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->

                            <!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->

                            <!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->
                        </ul>
                        <!-- /wp:list -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:buttons {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
                        <div class="wp-block-buttons alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"font dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}}} -->
                            <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-font-dark-color has-text-color has-link-color wp-element-button">Lorem</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0rem","right":"0rem"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"default"}} -->
            <div class="wp-block-column" style="border-style:none;border-width:0px;padding-top:var(--wp--preset--spacing--30);padding-right:0rem;padding-bottom:var(--wp--preset--spacing--30);padding-left:0rem"><!-- wp:group {"align":"full","className":"dswp-card","style":{"spacing":{"padding":{"right":"0","left":"0","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"111px","justifyContent":"left","wideSize":""}} -->
                <div class="wp-block-group alignfull dswp-card" style="padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","className":"dswp-card-header","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull dswp-card-header" style="padding-right:0;padding-left:0"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                        <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                        <!-- /wp:image -->

                        <!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"textColor":"font dark","fontSize":"medium"} -->
                        <h3 class="wp-block-heading has-text-align-left has-font-dark-color has-text-color has-link-color has-medium-font-size" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">Lorem ipsum dolor sit</h3>
                        <!-- /wp:heading -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"metadata":{"name":"Separator"},"align":"full","className":"dswp-card-divider","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"color":"var:preset|color|border-dark","width":"12px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull dswp-card-divider" style="border-top-color:var(--wp--preset--color--border-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40);padding-top:0;padding-bottom:0"></div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","className":"dswp-card-content","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull dswp-card-content" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"},"padding":{"right":"0","left":"0"}},"typography":{"lineHeight":"1.7"},"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark"} -->
                        <p class="has-text-align-left has-font-dark-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:var(--wp--preset--spacing--40);margin-left:0;padding-right:0;padding-left:0;line-height:1.7">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie a mi eu dictum. Sed eget dictum massaLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus molestie a mi eu dictum. Sed eget dictum massa</p>
                        <!-- /wp:paragraph -->

                        <!-- wp:list {"className":"wp-block-list","style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
                        <ul style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->

                            <!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->

                            <!-- wp:list-item -->
                            <li><a href="#placeholderlink" data-type="link" data-id="#.ca">Lorem Ipsum</a></li>
                            <!-- /wp:list-item -->
                        </ul>
                        <!-- /wp:list -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"0","bottom":"0"},"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
                    <div class="wp-block-group alignfull" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:buttons {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
                        <div class="wp-block-buttons alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"font dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}}} -->
                            <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-font-dark-color has-text-color has-link-color wp-element-button">Lorem</a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->