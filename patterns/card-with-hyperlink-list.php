<?php
/**
 * Title: Card with Hyperlink List
 * Slug: design-system-wordpress-theme/card-with-hyperlinks-list
 * Categories: call-to-action
 *
 * @package Design-System-WordPress-Theme
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained","justifyContent":"center","contentSize":"960px"},"metadata":{"categories":["call-to-action"],"patternName":"core/block/15254","name":"Card with Hyperlink List"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"0","left":"var:preset|spacing|50"}}},"layout":{"type":"constrained"},"metadata":{"name":"Sections"}} -->
    <div class="wp-block-group alignfull" style="padding-right:0;padding-left:var(--wp--preset--spacing--50)"><!-- wp:group -->
        <div class="wp-block-group"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"0"},"padding":{"right":"0","left":"0"}}}} -->
            <div class="wp-block-columns alignwide" style="padding-right:0;padding-left:0"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group alignfull"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                            <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                            <!-- /wp:image -->

                            <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-center has-medium-font-size">Lorem</h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                        <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"width":"12px","color":"var:preset|color|banner-background-dark"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"},"metadata":{"name":"Separator"}} -->
                        <div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--banner-background-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"xx-large"} -->
                            <p class="has-text-align-left has-xx-large-font-size">Integer sollicitudin tortor a nibh pulvinar, a lacinia neque tempus.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:list {"style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"0","left":"0"}}},"className":"wp-block-list"} -->
                                <ul style="padding-right:0;padding-left:0;line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->

                                    <!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->

                                    <!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->
                                </ul>
                                <!-- /wp:list -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                            <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                            <!-- /wp:spacer -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"250px","justifyContent":"left"}} -->
                            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                                <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"width":75,"className":"is-style-outline"} -->
                                    <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link wp-element-button">About</a></div>
                                    <!-- /wp:button -->
                                </div>
                                <!-- /wp:buttons -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group alignfull"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                            <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                            <!-- /wp:image -->

                            <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-center has-medium-font-size">Lorem</h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                        <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"width":"12px","color":"var:preset|color|banner-background-dark"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"},"metadata":{"name":"Separator"}} -->
                        <div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--banner-background-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"xx-large"} -->
                            <p class="has-text-align-left has-xx-large-font-size">Integer sollicitudin tortor a nibh pulvinar, a lacinia neque tempus.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:list {"style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"0","left":"0"}}},"className":"wp-block-list"} -->
                                <ul style="padding-right:0;padding-left:0;line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->

                                    <!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->

                                    <!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->
                                </ul>
                                <!-- /wp:list -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                            <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                            <!-- /wp:spacer -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"250px","justifyContent":"left"}} -->
                            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                                <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"width":75,"className":"is-style-outline"} -->
                                    <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link wp-element-button">About</a></div>
                                    <!-- /wp:button -->
                                </div>
                                <!-- /wp:buttons -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group alignfull"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                            <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                            <!-- /wp:image -->

                            <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-center has-medium-font-size">Lorem</h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                        <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"width":"12px","color":"var:preset|color|banner-background-dark"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"},"metadata":{"name":"Separator"}} -->
                        <div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--banner-background-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"xx-large"} -->
                            <p class="has-text-align-left has-xx-large-font-size">Integer sollicitudin tortor a nibh pulvinar, a lacinia neque tempus.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:list {"style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"0","left":"0"}}},"className":"wp-block-list"} -->
                                <ul style="padding-right:0;padding-left:0;line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->

                                    <!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->

                                    <!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->
                                </ul>
                                <!-- /wp:list -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                            <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                            <!-- /wp:spacer -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"250px","justifyContent":"left"}} -->
                            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                                <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"width":75,"className":"is-style-outline"} -->
                                    <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link wp-element-button">About</a></div>
                                    <!-- /wp:button -->
                                </div>
                                <!-- /wp:buttons -->
                            </div>
                            <!-- /wp:group -->
                        </div>
                        <!-- /wp:group -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group alignfull"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                            <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                            <!-- /wp:image -->

                            <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-center has-medium-font-size">Lorem</h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                        <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"width":"12px","color":"var:preset|color|banner-background-dark"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"},"metadata":{"name":"Separator"}} -->
                        <div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--banner-background-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group alignfull" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","fontSize":"xx-large"} -->
                            <p class="has-text-align-left has-xx-large-font-size">Integer sollicitudin tortor a nibh pulvinar, a lacinia neque tempus.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
                            <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:list {"style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"0","left":"0"}}},"className":"wp-block-list"} -->
                                <ul style="padding-right:0;padding-left:0;line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->

                                    <!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->

                                    <!-- wp:list-item -->
                                    <li><a href="#placeholderlink" data-type="link" data-id="google.ca">Lorem Ipsum</a></li>
                                    <!-- /wp:list-item -->
                                </ul>
                                <!-- /wp:list -->
                            </div>
                            <!-- /wp:group -->

                            <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                            <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                            <!-- /wp:spacer -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"250px","justifyContent":"left"}} -->
                            <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                                <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"width":75,"className":"is-style-outline"} -->
                                    <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link wp-element-button">About</a></div>
                                    <!-- /wp:button -->
                                </div>
                                <!-- /wp:buttons -->
                            </div>
                            <!-- /wp:group -->
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
</div>
<!-- /wp:group -->