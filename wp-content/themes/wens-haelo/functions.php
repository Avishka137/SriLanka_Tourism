<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wens-haelo
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function wens_haelo_styles() {
	wp_enqueue_style(
		'wens-haelo-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'wens_haelo_styles' );


function wens_haelo_register_block_pattern_categories(){
    register_block_pattern_category(
        'wens-haelo',
        array( 'label' => __( 'Theme Patterns', 'wens-haelo' ) )
    );

}
add_action('init', 'wens_haelo_register_block_pattern_categories');


require get_template_directory() . '/tgm-plugin/tgm-hook.php';