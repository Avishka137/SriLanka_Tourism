<?php
/**
 * P Blog Customizer support
 *
 * @package WordPress
 * @subpackage Pblog
 * @since P Blog 1.0
 */

/**
 * Implement Customizer additions and adjustments.
 *
 * @since P Blog 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function pblog_customize_register( $wp_customize ) {
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'pblog' );
	$wp_customize->get_setting( 'header_textcolor' )->default = '#1a1a1a';

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'pblog' );

	// Add custom description to Colors and Background controls or sections.
	if ( property_exists( $wp_customize->get_control( 'background_color' ), 'description' ) ) {
		$wp_customize->get_control( 'background_color' )->description = __( 'May only be visible on wide screens.', 'pblog' );
		$wp_customize->get_control( 'background_image' )->description = __( 'May only be visible on wide screens.', 'pblog' );
	} else {
		$wp_customize->get_section( 'colors' )->description           = __( 'Background may only be visible on wide screens.', 'pblog' );
		$wp_customize->get_section( 'background_image' )->description = __( 'Background may only be visible on wide screens.', 'pblog' );
	}

	$wp_customize->add_section( 'pblog_navigation', array(
		'priority'    => 20,
		'title'       => __( 'Header Navigation', 'pblog' ),
		'description' => __( 'From here, you can control the elements of header section', 'pblog' ),
	) );
	$wp_customize->add_setting( 'pblog_searchbox', array(
		'default'           => true,
		'type'           	=> 'theme_mod',
		'sanitize_callback' => 'pblog_sanitize_checkbox',
		//'transport'  		=> 'postMessage'
	) );
	$wp_customize->add_control( 'pblog_searchbox', array(
	  	'label'    		=> __( 'Search Box', 'pblog' ),
		'description' 	=> __( 'Enable or disable search box on the header', 'pblog' ),
		'section'  		=> 'pblog_navigation',
		'settings'   	=> 'pblog_searchbox',
		'type' 			=> 'checkbox',
	) );

}
add_action( 'customize_register', 'pblog_customize_register' );

/**
 * Bind JS handlers to make Customizer preview reload changes asynchronously.
 *
 * @since P Blog 1.0
 */
function pblog_customize_preview_js() {
	wp_enqueue_script( 'pblog_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'pblog_customize_preview_js' );

/**
 * Add contextual help to the Themes and Post edit screens.
 *
 * @since P Blog 1.0
 */
function pblog_contextual_help() {
	if ( 'admin_head-edit.php' === current_filter() && 'post' !== $GLOBALS['typenow'] ) {
		return;
	}

	get_current_screen()->add_help_tab( array(
		'id'      => 'pblog',
		'title'   => __( 'P Blog', 'pblog' ),
		'content' =>
			'<ul>' .
				'<li>' . sprintf( __( 'Enhance your site design by using <a href="%s">Featured Images</a> for posts you&rsquo;d like to stand out (also known as post thumbnails). This allows you to associate an image with your post without inserting it. P Blog uses featured images for posts and pages&mdash;above the title&mdash;and in the Featured Content area on the home page.', 'pblog' ), 'https://codex.wordpress.org/Post_Thumbnails#Setting_a_Post_Thumbnail' ) . '</li>' .
				'<li>' . sprintf( __( 'For an in-depth tutorial, and more tips and tricks, visit the <a href="%s">P Blog documentation</a>.', 'pblog' ), 'https://codex.wordpress.org/Pblog' ) . '</li>' .
			'</ul>',
	) );
}
add_action( 'admin_head-themes.php', 'pblog_contextual_help' );
add_action( 'admin_head-edit.php',   'pblog_contextual_help' );

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function pblog_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}