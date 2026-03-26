<?php
/**
 * Title: Second Banner
 * Slug: wens-haelo/second-banner
 * Categories: wens-haelo
 *
 * @package wens-haelo
 * @since 1.0.0
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-one.jpg","id":134,"dimRatio":50,"customOverlayColor":"#091057","isUserOverlayColor":true,"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#091057"></span><img class="wp-block-cover__image-background wp-image-134" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-one.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"45px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:45px"><?php echo esc_html__( 'About Us', 'wens-haelo' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}}} -->
<p class="has-text-align-center" style="text-transform:uppercase"><?php echo esc_html__( 'we provide the solution for asset management', 'wens-haelo' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->