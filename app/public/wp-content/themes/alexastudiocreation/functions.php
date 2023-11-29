<?php
/**
 * Theme Functions.
 *
 * @package Alexastudiocreation
 */


// ABSOLUTE PATH OF THEME :

if ( ! defined( 'ALEXASTUDIOCREATION_DIR_PATH' ) ) {
  define('ALEXASTUDIOCREATION_DIR_PATH', untrailingslashit( get_stylesheet_directory() ) );
}


require_once ALEXASTUDIOCREATION_DIR_PATH . '/inc/helpers/autoloader.php';

// CALLING THE CALLED INSTANCE OF SINGLETON TO CHECK IF EXISTS:
function alexastudiocreation_get_theme_instance() {
  \ALEXASTUDIOCREATION_THEME\Inc\ALEXASTUDIOCREATION_THEME::get_instance();
}

alexastudiocreation_get_theme_instance();

// TEST DU FILEMTIME :
// echo '<pre>';
// print_r(filemtime( get_stylesheet_directory() . '/style.css' ) );
// wp_die();

function alexastudiocreation_enqueue_scripts() {

  // REGISTER STYLES.
  wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime( get_stylesheet_directory() . '/style.css' ), 'all' );
  wp_register_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/src/library/css/bootstrap.min.css' );

  // REGISTER SRCIPTS.
  wp_register_script('main-js', get_stylesheet_directory_uri() . '/assets/main.js', [], filemtime( get_stylesheet_directory() . '/assets/main.js' ), true );
  wp_register_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/assets/src/library/js/bootstrap.min.js', array( 'jquery' ), null, true );

  // ENQUEUE STYLES.
  wp_enqueue_style('stylesheet');
  wp_enqueue_style('bootstrap-css');

  // ENQUEUE SCRIPTS.
  wp_enqueue_script('main-js');
  wp_enqueue_script('bootstrap-js');
}


add_action('wp_enqueue_scripts', 'alexastudiocreation_enqueue_scripts');


?>
