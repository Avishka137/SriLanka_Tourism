<?php
/**
 * Title: Main Banner
 * Slug: wens-haelo/main-banner
 * Categories: wens-haelo
 *
 * @package wens-haelo
 * @since 1.0.0
 */
?>


<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-six.jpg","id":161,"dimRatio":50,"customOverlayColor":"#091057","isUserOverlayColor":true,"minHeight":650,"minHeightUnit":"px","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:650px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#091057"></span><img class="wp-block-cover__image-background wp-image-161" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-six.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"40px","lineHeight":"0"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<p class="has-base-color has-text-color has-link-color" style="font-size:40px;line-height:0"><?php echo esc_html__( 'Empower', 'wens-haelo' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"80px"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-link-color" style="font-size:80px"><?php echo esc_html__( 'Your Financial', 'wens-haelo' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<p class="has-base-color has-text-color has-link-color"><?php echo esc_html__( 'We help you managing asset, provide financial advise. Leave <br>money issue with us and focus on your core business.', 'wens-haelo' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"border":{"width":"2px","color":"#ffffff","radius":"0px"},"color":{"background":"#ffffff00"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-text-color has-background has-link-color has-border-color wp-element-button" style="border-color:#ffffff;border-width:2px;border-radius:0px;background-color:#ffffff00"><?php echo esc_html__( 'Learn More', 'wens-haelo' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"border":{"color":"#024caa","width":"2px","radius":"0px"},"color":{"background":"#024caa"}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color has-background has-link-color has-border-color wp-element-button" style="border-color:#024caa;border-width:2px;border-radius:0px;background-color:#024caa"><?php echo esc_html__( 'Contact US', 'wens-haelo' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
