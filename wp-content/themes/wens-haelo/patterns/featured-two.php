<?php
/**
 * Title: Featured Two
 * Slug: wens-haelo/featured-two
 * Categories: wens-haelo
 *
 * @package wens-haelo
 * @since 1.0.0
 */
?>

<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base"} -->
<div class="wp-block-columns alignfull has-base-color has-primary-background-color has-text-color has-background has-link-color" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"41%","style":{"spacing":{"padding":{"right":"60px","left":"60px","top":"30px","bottom":"30px"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:30px;padding-right:60px;padding-bottom:30px;padding-left:60px;flex-basis:41%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontSize":"40px","lineHeight":"1.3"}}} -->
<h2 class="wp-block-heading" style="font-size:40px;line-height:1.3"><?php echo esc_html__( 'We are an expert in', 'wens-haelo' ); ?><br> <?php echo esc_html__( 'this field', 'wens-haelo' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Yet I feel that I never was a greater artist than now.', 'wens-haelo' ); ?><br><?php echo esc_html__( 'When, while the lovely valley teems.', 'wens-haelo' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
<li style="padding-top:0;padding-bottom:0"><?php echo esc_html__( 'Premium services and beyond your expectation', 'wens-haelo' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Get the best support among all venders', 'wens-haelo' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Fully responsive and works great on all major devices', 'wens-haelo' ); ?></li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><?php echo esc_html__( 'Tons of admin panel options', 'wens-haelo' ); ?></li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"color":{"background":"#024caa"},"border":{"radius":"0px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;background-color:#024caa"><?php echo esc_html__( 'Read Our Story', 'wens-haelo' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-three.jpg","id":134,"dimRatio":0,"customOverlayColor":"#aea192","isUserOverlayColor":true,"minHeight":550,"minHeightUnit":"px","isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:550px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#aea192"></span><img class="wp-block-cover__image-background wp-image-134" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-three.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->