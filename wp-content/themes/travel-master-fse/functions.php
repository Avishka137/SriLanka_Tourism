<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


function travel_master_fse_scripts(){
   // enqueue parent style
	wp_enqueue_style('travel-master-fse-parent-style', get_theme_file_uri() . '/style.css');
    
}
add_action('wp_enqueue_scripts', 'travel_master_fse_scripts');


function travel_master_fse_register_block_pattern_categories(){
    register_block_pattern_category(
        'travel-master-fse',
        array( 'label' => __( 'Travel Master FSE', 'travel-master-fse' ) )
    );

}
add_action('init', 'travel_master_fse_register_block_pattern_categories');

require get_theme_file_path() . '/tgm-plugin/tgm-hook.php';