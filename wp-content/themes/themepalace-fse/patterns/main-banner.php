<?php
/**
 * Title: Main Banner
 * Slug: themepalace-fse/main-banner
 * Categories: themepalace-fse
 *
 * @package themepalace-fse
 * @since 1.0.0
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":421,"dimRatio":40,"customOverlayColor":"#091057","isUserOverlayColor":true,"minHeight":750,"minHeightUnit":"px","align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:750px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-40 has-background-dim" style="background-color:#091057"></span><img class="wp-block-cover__image-background wp-image-421" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<p class="has-text-align-center has-base-color has-text-color has-link-color" style="font-size:18px"><strong><?php echo esc_html__( 'Collection 2025', 'themepalace-fse' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"80px"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-link-color" style="font-size:80px"><?php echo esc_html__( 'Unleash Your Creativity', 'themepalace-fse' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<p class="has-text-align-center has-base-color has-text-color has-link-color"><strong><?php echo esc_html__( 'Lorem Ipsum', 'themepalace-fse' ); ?></strong>&nbsp;<?php echo esc_html__( 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has ', 'themepalace-fse' ); ?><br><?php echo esc_html__( 'been the industrys standard dummy text ever since the 1500s, when an unknown ', 'themepalace-fse' ); ?><br><?php echo esc_html__( 'printer took a galley of type and scrambled it to make a type specimen book.', 'themepalace-fse' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"30px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:30px"><!-- wp:button {"textAlign":"center","textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"border":{"radius":"30px","width":"4px"},"spacing":{"padding":{"left":"30px","right":"30px"}},"color":{"background":"#ffffff00"}},"borderColor":"base"} -->
<div class="wp-block-button"><a href="#" class="wp-block-button__link has-base-color has-text-color has-background has-link-color has-border-color has-base-border-color has-text-align-center wp-element-button" style="border-width:4px;border-radius:30px;background-color:#ffffff00;padding-right:30px;padding-left:30px"><?php echo esc_html__( 'View More', 'themepalace-fse' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"color":{"background":"#024caa"},"border":{"radius":"30px"},"spacing":{"padding":{"left":"30px","right":"30px"}}}} -->
<div class="wp-block-button"><a href="#" class="wp-block-button__link has-base-color has-text-color has-background has-link-color wp-element-button" style="border-radius:30px;background-color:#024caa;padding-right:30px;padding-left:30px"><?php echo esc_html__( 'Start Now', 'themepalace-fse' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->