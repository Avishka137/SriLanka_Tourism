<?php
/**
 * Title: 404 Page Not Found
 * Slug: wens-haelo/404
 * Categories: wens-haelo
 *
 * @package wens-haelo
 * @since 1.0.0
 */
?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"90px"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:90px"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"100px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:100px"><?php echo esc_html__( '404', 'wens-haelo' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">
<?php echo esc_html__( 'Page not found', 'wens-haelo' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'wens-haelo' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","style":{"border":{"radius":"0px"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"backgroundColor":"primary","textColor":"base"} /--></main>
<!-- /wp:group -->