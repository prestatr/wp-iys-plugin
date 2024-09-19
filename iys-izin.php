<?php
/**
 * Plugin Name: IYS 
 * Description: IYS 
 * Version:     1.0.0
 * Author:      OxiYazilim
 * Author URI:  https://oxiyazilim.com/
 * Text Domain: iys-izin
 *
 */

 /*
function register_hello_world_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/example.php' );

	$widgets_manager->register( new \Example() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );

*/



add_action('wp_enqueue_scripts', 'iys_scripts');

function iys_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_script('iys-js', plugins_url('/assets/js/js.js', __FILE__), array('jquery') );
}