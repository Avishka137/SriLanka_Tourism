<?php

/**
 * Title: Main Banner
 * Slug: travel-master-fse/main-banner
 * Categories: travel-master-fse
 *
 * @package travel-master-fse
 * @since 1.0.0
 */
?>


<!-- wp:cover {"url":"<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/main-banner.jpg","id":76,"dimRatio":50,"overlayColor":"black","isUserOverlayColor":true,"minHeight":800,"minHeightUnit":"px","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:800px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-76" alt="" src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/main-banner.jpg" data-object-fit="cover" />
    <div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
        <div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"700px"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"92px","fontStyle":"normal","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|base"},":hover":{"color":{"text":"#00afe9"}}}}},"textColor":"base","fontFamily":"raleway"} -->
                <h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-link-color has-raleway-font-family" style="font-size:92px;font-style:normal;font-weight:900"><a href="#"><?php echo esc_html__('Japan', 'travel-master-fse'); ?></a></h2>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"22px"}},"textColor":"base","fontFamily":"mulish"} -->
                <p class="has-text-align-center has-base-color has-text-color has-link-color has-mulish-font-family" style="font-size:22px;font-style:normal;font-weight:700"><?php echo esc_html__('Japan is an island country in East Asia. Located in the Pacific Ocean, it lies off the easter...', 'travel-master-fse'); ?></p>
                <!-- /wp:paragraph -->

                <!-- wp:buttons {"className":"tmf-btn-primary","style":{"spacing":{"margin":{"top":"30px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
                <div class="wp-block-buttons tmf-btn-primary" style="margin-top:30px"><!-- wp:button {"textAlign":"center","textColor":"base","className":"is-style-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"border":{"radius":"50px","width":"2px"},"spacing":{"padding":{"left":"35px","right":"35px","top":"14px","bottom":"14px"}},"color":{"background":"#ffffff00"},"typography":{"fontSize":"16px"}},"fontFamily":"raleway","borderColor":"base"} -->
                    <div class="wp-block-button has-custom-font-size is-style-fill has-raleway-font-family" style="font-size:16px"><a class="wp-block-button__link has-base-color has-text-color has-background has-link-color has-border-color has-base-border-color has-text-align-center wp-element-button" href="#" style="border-width:2px;border-radius:50px;background-color:#ffffff00;padding-top:14px;padding-right:35px;padding-bottom:14px;padding-left:35px"><?php echo esc_html__('Discover More', 'travel-master-fse'); ?></a></div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
</div>
<!-- /wp:cover -->