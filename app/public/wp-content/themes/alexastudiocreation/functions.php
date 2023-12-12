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


if ( ! defined ( 'ALEXASTUDIOCREATION_DIR_URI' )) {
  define('ALEXASTUDIOCREATION_DIR_URI', untrailingslashit( get_stylesheet_directory_uri() ) );
}

require_once ALEXASTUDIOCREATION_DIR_PATH . '/inc/helpers/autoloader.php';
require_once ALEXASTUDIOCREATION_DIR_PATH . '/inc/helpers/template-tags.php';


// CALLING THE CALLED INSTANCE OF SINGLETON TO CHECK IF EXISTS:
function alexastudiocreation_get_theme_instance() {
  \ALEXASTUDIOCREATION_THEME\Inc\ALEXASTUDIOCREATION_THEME::get_instance();
}

alexastudiocreation_get_theme_instance();


// TEST DU FILEMTIME :
// echo '<pre>';
// print_r(filemtime( get_stylesheet_directory() . '/style.css' ) );
// wp_die();
