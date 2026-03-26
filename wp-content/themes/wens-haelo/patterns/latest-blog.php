<?php
/**
 * Title: Latest Blog
 * Slug: wens-haelo/latest-blog
 * Categories: wens-haelo
 *
 * @package wens-haelo
 * @since 1.0.0
 */
?>


<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"90px","bottom":"90px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:90px;padding-bottom:90px"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"40px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:40px"><?php echo esc_html__( 'Latest News', 'wens-haelo' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#024caa"},"elements":{"link":{"color":{"text":"#024caa"}}}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#024caa"><?php echo esc_html__( 'Read All News', 'wens-haelo' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0px","margin":{"top":"30px","bottom":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:30px;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:query {"queryId":4,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"30px","bottom":"30px","left":"20px","right":"20px"}},"color":{"background":"#f9f9f9"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#f9f9f9;padding-top:30px;padding-right:20px;padding-bottom:30px;padding-left:20px"><!-- wp:post-date {"style":{"typography":{"fontSize":"12px"}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"20px","lineHeight":"1.4"},"spacing":{"margin":{"bottom":"10px"}}}} /-->

<!-- wp:post-excerpt {"excerptLength":25} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->