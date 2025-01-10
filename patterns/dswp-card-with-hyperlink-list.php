<?php
/**
 * Title: DSWP Card with Hyperlink List
 * Slug: design-system-wordpress-theme/dswp-card-with-hyperlinks-list
 * Categories: call-to-action
 *
 * @package Design-System-WordPress-Theme
 */
?>
<!-- wp:group {"metadata":{"categories":["call-to-action"],"patternName":"design-system-wordpress-theme/dswp-card-with-hyperlinks-list","name":"DSWP Card with Hyperlink List"},"align":"full","className":"dswp-card-with-hyperlink-list","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"center","contentSize":"960px"}} -->
<div class="wp-block-group alignfull dswp-card-with-hyperlink-list" style="padding-right:0;padding-left:0"><!-- wp:group {"metadata":{"name":"Sections"},"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|70","left":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="padding-right:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)"><!-- wp:group -->
        <div class="wp-block-group"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"0"},"padding":{"right":"0","left":"0"}}}} -->
            <div class="wp-block-columns alignwide" style="padding-right:0;padding-left:0"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","className":"dswp-column-group","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull dswp-column-group" style="padding-right:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group alignfull"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                            <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                            <!-- /wp:image -->

                            <!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark","fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-center has-font-dark-color has-text-color has-link-color has-medium-font-size">Lorem</h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                        <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:group {"metadata":{"name":"Separator"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"color":"var:preset|color|border-dark","width":"12px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--border-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"align":"full","className":"dswp-flex-box","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group alignfull dswp-flex-box" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark","fontSize":"xx-large"} -->
                            <p class="has-text-align-left has-font-dark-color has-text-color has-link-color has-xx-large-font-size">Integer sollicitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
                            <div class="wp-block-group" style="padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
                                <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:list {"className":"wp-block-list","style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"0","left":"0"}}}} -->
                                    <ul style="padding-right:0;padding-left:0;line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
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

                                <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                                <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->

                                <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"250px","justifyContent":"left"}} -->
                                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
                                    <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"font dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}}} -->
                                        <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-font-dark-color has-text-color has-link-color wp-element-button">About</a></div>
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
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","className":"dswp-column-group","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull dswp-column-group" style="padding-right:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group alignfull"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                            <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                            <!-- /wp:image -->

                            <!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark","fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-center has-font-dark-color has-text-color has-link-color has-medium-font-size">Lorem</h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                        <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:group {"metadata":{"name":"Separator"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"color":"var:preset|color|border-dark","width":"12px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--border-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"align":"full","className":"dswp-flex-box","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group alignfull dswp-flex-box" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark","fontSize":"xx-large"} -->
                            <p class="has-text-align-left has-font-dark-color has-text-color has-link-color has-xx-large-font-size">Integer sollicitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
                            <div class="wp-block-group" style="padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
                                <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:list {"className":"wp-block-list","style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"0","left":"0"}}}} -->
                                    <ul style="padding-right:0;padding-left:0;line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
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

                                <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                                <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->

                                <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"250px","justifyContent":"left"}} -->
                                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
                                    <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"font dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}}} -->
                                        <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-font-dark-color has-text-color has-link-color wp-element-button">About</a></div>
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
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","className":"dswp-column-group","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull dswp-column-group" style="padding-right:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group alignfull"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                            <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                            <!-- /wp:image -->

                            <!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark","fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-center has-font-dark-color has-text-color has-link-color has-medium-font-size">Lorem</h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                        <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:group {"metadata":{"name":"Separator"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"color":"var:preset|color|border-dark","width":"12px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--border-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"align":"full","className":"dswp-flex-box","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group alignfull dswp-flex-box" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark","fontSize":"xx-large"} -->
                            <p class="has-text-align-left has-font-dark-color has-text-color has-link-color has-xx-large-font-size">Integer sollicitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
                            <div class="wp-block-group" style="padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
                                <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:list {"className":"wp-block-list","style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"0","left":"0"}}}} -->
                                    <ul style="padding-right:0;padding-left:0;line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
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

                                <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                                <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->

                                <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"250px","justifyContent":"left"}} -->
                                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
                                    <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"font dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}}} -->
                                        <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-font-dark-color has-text-color has-link-color wp-element-button">About</a></div>
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
                    <!-- /wp:group -->
                </div>
                <!-- /wp:column -->

                <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","className":"dswp-column-group","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"0"}}},"layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull dswp-column-group" style="padding-right:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:group {"align":"full","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                        <div class="wp-block-group alignfull"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","className":"is-resized"} -->
                            <figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-256.png' ); ?>" alt="" style="object-fit:cover;width:60px;height:60px" /></figure>
                            <!-- /wp:image -->

                            <!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark","fontSize":"medium"} -->
                            <h3 class="wp-block-heading has-text-align-center has-font-dark-color has-text-color has-link-color has-medium-font-size">Lorem</h3>
                            <!-- /wp:heading -->
                        </div>
                        <!-- /wp:group -->

                        <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                        <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                        <!-- /wp:spacer -->

                        <!-- wp:group {"metadata":{"name":"Separator"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"color":"var:preset|color|border-dark","width":"12px"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
                        <div class="wp-block-group alignfull" style="border-top-color:var(--wp--preset--color--border-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
                        <!-- /wp:group -->

                        <!-- wp:group {"align":"full","className":"dswp-flex-box","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
                        <div class="wp-block-group alignfull dswp-flex-box" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}},"textColor":"font dark","fontSize":"xx-large"} -->
                            <p class="has-text-align-left has-font-dark-color has-text-color has-link-color has-xx-large-font-size">Integer sollicitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin tortor a nibh pulvinar, a lacinia neque tempuitudin.</p>
                            <!-- /wp:paragraph -->

                            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
                            <div class="wp-block-group" style="padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
                                <div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:list {"className":"wp-block-list","style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"0","left":"0"}}}} -->
                                    <ul style="padding-right:0;padding-left:0;line-height:2.2" class="wp-block-list"><!-- wp:list-item -->
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

                                <!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
                                <div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
                                <!-- /wp:spacer -->

                                <!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"250px","justifyContent":"left"}} -->
                                <div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
                                    <div class="wp-block-buttons" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textColor":"font dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|font dark"}}}}} -->
                                        <div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-font-dark-color has-text-color has-link-color wp-element-button">About</a></div>
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