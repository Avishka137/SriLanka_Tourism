<?php

/**
 * Title: Header
 * Slug: travel-master-fse/header
 * Categories: travel-master-fse
 *
 * @package travel-master-fse
 * @since 1.0.0
 */
?>

<!-- wp:group {"metadata":{"categories":["header"],"patternName":"core/header-inside-full-width-background-image","name":"Header inside full-width background image"},"align":"full","className":"tmf-stick-header ","style":{"dimensions":{"minHeight":""},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"transparent","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull tmf-stick-header has-transparent-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group alignwide"><!-- wp:image {"id":56,"width":"216px","sizeSlug":"full","linkDestination":"none"} -->
        <figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/logo-white-1.png" alt="" class="wp-image-56" style="width:216px" /></figure>
        <!-- /wp:image -->
        <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|60"}},"textColor":"base","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
        <div class="wp-block-group has-base-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph -->
            <p><a href="#"><?php echo esc_html__('Home', 'travel-master-fse'); ?></a></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p><a href="#"><?php echo esc_html__('Destination', 'travel-master-fse'); ?></a></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p><a href="#"><?php echo esc_html__('Blog', 'travel-master-fse'); ?></a></p>
            <!-- /wp:paragraph -->

            <!-- wp:paragraph -->
            <p><a href="#"><?php echo esc_html__('Contact', 'travel-master-fse'); ?></a></p>
            <!-- /wp:paragraph -->

            <!-- wp:social-links {"iconColor":"base","iconColorValue":"#ffffff","customIconBackgroundColor":"#505151","iconBackgroundColorValue":"#505151","className":"tmf-header-social is-style-default","style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
            <ul class="wp-block-social-links has-icon-color has-icon-background-color tmf-header-social is-style-default" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

                <!-- wp:social-link {"url":"#","service":"twitter"} /-->

                <!-- wp:social-link {"url":"#","service":"instagram"} /-->

                <!-- wp:social-link {"url":"#","service":"pinterest"} /-->
            </ul>
            <!-- /wp:social-links -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->