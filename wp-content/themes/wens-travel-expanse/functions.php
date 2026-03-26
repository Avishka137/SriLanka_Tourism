<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


function wens_travel_expanse_scripts(){
   // enqueue parent style
	wp_enqueue_style('wens-travel-expanse-parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'wens_travel_expanse_scripts');


function wens_travel_expanse_register_block_pattern_categories(){
    register_block_pattern_category(
        'wens-travel-expanse',
        array( 'label' => __( 'WENS Travel Expanse', 'wens-travel-expanse' ) )
    );

}
add_action('init', 'wens_travel_expanse_register_block_pattern_categories');

require get_theme_file_path() . '/tgm-plugin/tgm-hook.php';