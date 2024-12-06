<?php
/**
 * Title: Card with Hyperlink List
 * Slug: design-system-wordpress-theme/card-with-hyperlinks-list
 * Categories: call-to-action
 *
 * @package Design-System-WordPress-Theme
 */
?>

<!-- wp:group {"align":"full","className":"alignfull","style":{"spacing":{"padding":{"top":"calc( 0.5 * var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-right, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal)))","bottom":"calc( 0.5 * var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-right, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal)))","left":"var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-left, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal))","right":"var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-right, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal))"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"center","contentSize":"960px"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:calc( 0.5 * var(--wp--style--root--padding-right, var(--wp--custom--gap--horizontal)));padding-right:var(--wp--style--root--padding-right, var(--wp--custom--gap--horizontal));padding-bottom:calc( 0.5 * var(--wp--style--root--padding-right, var(--wp--custom--gap--horizontal)));padding-left:var(--wp--style--root--padding-left, var(--wp--custom--gap--horizontal))"><!-- wp:group {"metadata":{"name":"Sections"},"align":"wide"} -->
<div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Section"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"calc( 0.25 * var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002droot\u002d\u002dpadding-right, var(\u002d\u002dwp\u002d\u002dcustom\u002d\u002dgap\u002d\u002dhorizontal)))"} -->
<div style="height:calc( 0.25 * var(--wp--style--root--padding-right, var(--wp--custom--gap--horizontal)))" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"metadata":{"name":"Items"},"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"0"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"metadata":{"name":"Item"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|10","left":"0","right":"var:preset|spacing|60"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--10);padding-left:0"><!-- wp:group {"layout":{"type":"constrained","contentSize":"380px","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"60px","height":"60px","scale":"cover"} -->
<figure class="wp-block-image is-resized"><img alt="" style="object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size">Lorem</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"metadata":{"name":"Separator"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"width":"12px","color":"var:preset|color|banner-background-dark"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--banner-background-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"left","metadata":{"name":"Subtitle"},"fontSize":"xx-large"} -->
<p class="has-text-align-left has-xx-large-font-size">Lorem Ipsum Lorem</p>
<!-- /wp:paragraph -->

<!-- wp:list {"style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<ul style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);line-height:2.2" class="wp-block-list"><!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<li style="margin-top:0;margin-bottom:0"><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"header-color-background","textColor":"banner-background-dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|banner-background-dark"}}},"border":{"radius":"4px","width":"1px"}},"borderColor":"banner-background-dark"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-banner-background-dark-color has-header-color-background-background-color has-text-color has-background has-link-color has-border-color has-banner-background-dark-border-color wp-element-button" style="border-width:1px;border-radius:4px">Lorem Ipsum</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Item"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|10","left":"0","right":"var:preset|spacing|60"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--10);padding-left:0"><!-- wp:group {"layout":{"type":"constrained","contentSize":"380px","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"60px","height":"60px","scale":"cover"} -->
<figure class="wp-block-image is-resized"><img alt="" style="object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size">Lorem</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"metadata":{"name":"Separator"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"width":"12px","color":"var:preset|color|banner-background-dark"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--banner-background-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"left","metadata":{"name":"Subtitle"},"fontSize":"xx-large"} -->
<p class="has-text-align-left has-xx-large-font-size">Lorem Ipsum Lorem</p>
<!-- /wp:paragraph -->

<!-- wp:list {"style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<ul style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);line-height:2.2" class="wp-block-list"><!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<li style="margin-top:0;margin-bottom:0"><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"header-color-background","textColor":"banner-background-dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|banner-background-dark"}}},"border":{"radius":"4px","width":"1px"}},"borderColor":"banner-background-dark"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-banner-background-dark-color has-header-color-background-background-color has-text-color has-background has-link-color has-border-color has-banner-background-dark-border-color wp-element-button" style="border-width:1px;border-radius:4px">Lorem Ipsum</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Item"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|10","left":"0","right":"var:preset|spacing|60"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--10);padding-left:0"><!-- wp:group {"layout":{"type":"constrained","contentSize":"380px","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"60px","height":"60px","scale":"cover"} -->
<figure class="wp-block-image is-resized"><img alt="" style="object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size">Lorem</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"metadata":{"name":"Separator"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"width":"12px","color":"var:preset|color|banner-background-dark"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--banner-background-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"left","metadata":{"name":"Subtitle"},"fontSize":"xx-large"} -->
<p class="has-text-align-left has-xx-large-font-size">Lorem Ipsum Lorem</p>
<!-- /wp:paragraph -->

<!-- wp:list {"style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<ul style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);line-height:2.2" class="wp-block-list"><!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<li style="margin-top:0;margin-bottom:0"><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"header-color-background","textColor":"banner-background-dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|banner-background-dark"}}},"border":{"radius":"4px","width":"1px"}},"borderColor":"banner-background-dark"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-banner-background-dark-color has-header-color-background-background-color has-text-color has-background has-link-color has-border-color has-banner-background-dark-border-color wp-element-button" style="border-width:1px;border-radius:4px">Lorem Ipsum</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Item"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|10","left":"0","right":"var:preset|spacing|60"}}}} -->
<div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--10);padding-left:0"><!-- wp:group {"layout":{"type":"constrained","contentSize":"380px","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"60px","height":"60px","scale":"cover"} -->
<figure class="wp-block-image is-resized"><img alt="" style="object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size">Lorem</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"metadata":{"name":"Separator"},"style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":"0px"},"border":{"top":{"width":"12px","color":"var:preset|color|banner-background-dark"},"right":{"style":"none","width":"0px"},"bottom":{"style":"none","width":"0px"},"left":{"style":"none","width":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--banner-background-dark);border-top-width:12px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;min-height:0px;padding-top:0;padding-bottom:0"></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"left","metadata":{"name":"Subtitle"},"fontSize":"xx-large"} -->
<p class="has-text-align-left has-xx-large-font-size">Lorem Ipsum Lorem</p>
<!-- /wp:paragraph -->

<!-- wp:list {"style":{"typography":{"lineHeight":"2.2"},"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<ul style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);line-height:2.2" class="wp-block-list"><!-- wp:list-item {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<li style="margin-top:0;margin-bottom:0"><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><a href="">Lorem Ipsum Lorem</a></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","verticalAlignment":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"header-color-background","textColor":"banner-background-dark","width":75,"className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|banner-background-dark"}}},"border":{"radius":"4px","width":"1px"}},"borderColor":"banner-background-dark"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-75 is-style-outline"><a class="wp-block-button__link has-banner-background-dark-color has-header-color-background-background-color has-text-color has-background has-link-color has-border-color has-banner-background-dark-border-color wp-element-button" style="border-width:1px;border-radius:4px">Lorem Ipsum</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->