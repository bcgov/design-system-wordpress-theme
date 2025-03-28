<?php
/**
 * Title: dswp-post-pattern-horizontal-card-large-img-right
 * Slug: design-system-wordpress-theme/dswp-post-pattern-horizontal-card-large-img-right
 * Categories: query
 * Block Types: core/query
 *
 * @package Design-System-WordPress-Theme
 */

?>
<!-- wp:query {"queryId":8,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[]},"metadata":{"categories":["posts"],"patternName":"design-system-wordpress-theme/query-test","name":"query-test"},"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-query alignfull"><!-- wp:post-template {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"default"}} -->
    <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide"><!-- wp:columns {"templateLock":false,"lock":{"move":false,"remove":false},"align":"wide","className":"dswp-horizontal-card-large-img dswp-image-stack-reverse dswp-box-shadow-on-hover","style":{"border":{"width":"0px","style":"none"},"spacing":{"blockGap":{"top":"0"}}}} -->
        <div class="wp-block-columns alignwide dswp-horizontal-card-large-img dswp-image-stack-reverse dswp-box-shadow-on-hover" style="border-style:none;border-width:0px"><!-- wp:column {"verticalAlignment":"stretch","width":"60%","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","right":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|70"}},"layout":{"type":"default"}} -->
            <div class="wp-block-column is-vertically-aligned-stretch" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50);flex-basis:60%"><!-- wp:post-title /-->

                <!-- wp:post-content {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} /-->

                <!-- wp:read-more {"content":"Read more","style":{"border":{"radius":"5px","width":"1px"},"elements":{"link":{"color":{"text":"var:preset|color|banner-background-dark"}}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"background-light-gray","textColor":"banner-background-dark","borderColor":"font dark"} /-->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"top","width":"40%","templateLock":false,"lock":{"move":false,"remove":false},"className":"dswp-image-column","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
            <div class="wp-block-column is-vertically-aligned-top dswp-image-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:40%"><!-- wp:image {"id":15586,"className":"size-full"} -->
                <figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/square-512.png' ); ?>" alt="" class="wp-image-15586" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:query-no-results -->
        <!-- wp:paragraph -->
        <p>Sorry, but nothing was found. Please try a search with different keywords.</p>
        <!-- /wp:paragraph -->
        <!-- /wp:query-no-results -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide"><!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->

        <!-- wp:query-pagination-numbers /-->

        <!-- wp:query-pagination-next /-->
        <!-- /wp:query-pagination -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:query -->