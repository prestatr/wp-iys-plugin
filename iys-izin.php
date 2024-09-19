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

require_once 'iys-api.php';

add_action('wp_enqueue_scripts', 'iys_scripts');

function iys_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_script('iys-js', plugins_url('/assets/js/js.js', __FILE__), array('jquery') );
}


add_filter( 'wpcf7_validate_email*', 'custom_email_confirmation_validation_filter', 20, 2 );
  
function custom_email_confirmation_validation_filter( $result, $tag ) {
  if ( 'email-iys' == $tag->name ) {

    $iys = new Iys_api();
    var_dump($iys->checkEmail($_POST['email-iys']) );
    exit;

    // iys check email
    $result->invalidate( $tag, "Are you sure this is the correct address?" );
    return $result;


    $your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';
    $your_email_confirm = isset( $_POST['your-email-confirm'] ) ? trim( $_POST['your-email-confirm'] ) : '';
  
    if ( $your_email != $your_email_confirm ) {
      $result->invalidate( $tag, "Are you sure this is the correct address?" );
    }
  }
  
  return $result;
}