<?php
/**
 * Title: Featured One
 * Slug: wens-haelo/featured-one
 * Categories: wens-haelo
 *
 * @package wens-haelo
 * @since 1.0.0
 */
?>

<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"background":"#f5f5f5"}}} -->
<div class="wp-block-columns alignfull has-background" style="background-color:#f5f5f5;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-two.jpg","id":160,"dimRatio":0,"customOverlayColor":"#85827f","isUserOverlayColor":true,"minHeight":550,"minHeightUnit":"px","isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:550px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#85827f"></span><img class="wp-block-cover__image-background wp-image-160" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-two.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%","style":{"spacing":{"padding":{"right":"60px","left":"60px","top":"30px","bottom":"30px"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:30px;padding-right:60px;padding-bottom:30px;padding-left:60px;flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"color":{"text":"#024caa"},"elements":{"link":{"color":{"text":"#024caa"}}}}} -->
<p class="has-text-color has-link-color" style="color:#024caa"><?php echo esc_html__( 'Did you know that', 'wens-haelo' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontSize":"40px","lineHeight":"1.3"}}} -->
<h2 class="wp-block-heading" style="font-size:40px;line-height:1.3"><?php echo esc_html__( 'We are trusted by more than 5,000 clients', 'wens-haelo' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. More than 25 years of experience working in the industry has enabled us to build our services and solutions in strategy, consulting, digital.', 'wens-haelo' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"30px"}}}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"color":{"background":"#024caa"},"border":{"radius":"0px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-text-color has-background has-link-color wp-element-button" style="border-radius:0px;background-color:#024caa"><?php echo esc_html__( 'Read Our Story', 'wens-haelo' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->