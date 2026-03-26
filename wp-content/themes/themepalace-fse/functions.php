<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themepalace-fse
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function themepalace_fse_styles() {
	wp_enqueue_style(
		'themepalace-fse-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);


}
add_action( 'wp_enqueue_scripts', 'themepalace_fse_styles' );


function themepalace_fse_register_block_pattern_categories(){
    register_block_pattern_category(
        'themepalace-fse',
        array( 'label' => __( 'Theme Patterns', 'themepalace-fse' ) )
    );

}
add_action('init', 'themepalace_fse_register_block_pattern_categories');


require get_template_directory() . '/tgm-plugin/tgm-hook.php';
