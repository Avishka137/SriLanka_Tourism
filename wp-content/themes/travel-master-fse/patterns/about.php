<?php

/**
 * Title: About
 * Slug: travel-master-fse/about
 * Categories: travel-master-fse
 *
 * @package travel-master-fse
 * @since 1.0.0
 */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"0","left":"60px"},"padding":{"top":"0","bottom":"0"}}}} -->
        <div class="wp-block-columns are-vertically-aligned-center" style="padding-top:0;padding-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"","layout":{"type":"default"}} -->
            <div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":50,"width":"auto","height":"600px","sizeSlug":"full","linkDestination":"none","className":"tmf-about-us-leftimage","style":{"border":{"radius":"15px"}}} -->
                <figure class="wp-block-image size-full is-resized has-custom-border tmf-about-us-leftimage"><img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/about-us.jpg" alt="" class="wp-image-50" style="border-radius:15px;width:auto;height:600px" /></figure>
                <!-- /wp:image -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"blockGap":"15px","padding":{"top":"20px","bottom":"20px"}}}} -->
            <div class="wp-block-column is-vertically-aligned-center" style="padding-top:20px;padding-bottom:20px"><!-- wp:paragraph {"style":{"typography":{"fontSize":"38px","fontStyle":"normal","fontWeight":"400","lineHeight":"1.4"},"color":{"text":"#242625"},"elements":{"link":{"color":{"text":"#242625"}}}},"fontFamily":"mulish"} -->
                <p class="has-text-color has-link-color has-mulish-font-family" style="color:#242625;font-size:38px;font-style:normal;font-weight:400;line-height:1.4"><?php echo esc_html__( 'Go Places you have dreamed off', 'travel-master-fse' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#979797"}}},"color":{"text":"#979797"},"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"400"}},"fontFamily":"mulish"} -->
                <p class="has-text-color has-link-color has-mulish-font-family" style="color:#979797;font-size:16px;font-style:normal;font-weight:400"><?php echo esc_html__( 'Between the many mouths to feed, entry to myriad attractions and school holiday price hikes, traveling with kids can quickly add up. Follow these top tips to make your hard-earned cash go further as you...', 'travel-master-fse' ); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"30px"}},"border":{"width":"0px","style":"none"}},"layout":{"type":"flex","justifyContent":"left"}} -->
                <div class="wp-block-buttons" style="border-style:none;border-width:0px;margin-top:30px"><!-- wp:button {"textAlign":"center","className":"is-style-fill travel-master-fse-link-button","style":{"elements":{"link":{"color":{"text":"#00afe9"}}},"border":{"radius":"50px","width":"0px","style":"none"},"spacing":{"padding":{"left":"35px","right":"35px","top":"14px","bottom":"14px"}},"color":{"background":"#e5f8fc","text":"#00afe9"},"typography":{"fontSize":"16px"}},"fontFamily":"mulish"} -->
                    <div class="wp-block-button has-custom-font-size is-style-fill travel-master-fse-link-button has-mulish-font-family" style="font-size:16px"><a href="#" class="wp-block-button__link has-text-color has-background has-link-color has-text-align-center wp-element-button" style="border-style:none;border-width:0px;border-radius:50px;color:#00afe9;background-color:#e5f8fc;padding-top:14px;padding-right:35px;padding-bottom:14px;padding-left:35px"><?php echo esc_html__( 'Explore More', 'travel-master-fse' ); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->