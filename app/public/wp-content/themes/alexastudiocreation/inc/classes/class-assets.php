<?php
/**
 * Enqueue theme assets
 *
 * @package Alexastudiocreation
 */

namespace ALEXASTUDIOCREATION_THEME\Inc;

use ALEXASTUDIOCREATION_THEME\Inc\Traits\Singleton;

class Assets {
  use Singleton;


  // THERE ARE PROTECTED FUNCTIONS:
  protected function __construct() {
    // wp_die('Hello');

    //  load class.
    $this->setup_hooks();

  }

  protected function setup_hooks() {

    /**
     * Actions.
     */
    add_action(  'wp_enqueue_scripts', [ $this, 'register_styles' ] );
    add_action(  'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
  }

  public function register_styles() {
    // REGISTER STYLES.
    wp_register_style('stylesheet', get_stylesheet_uri(), [], filemtime( ALEXASTUDIOCREATION_DIR_PATH . '/style.css' ), 'all' );
    wp_register_style( 'bootstrap-css', ALEXASTUDIOCREATION_DIR_URI . '/assets/src/library/css/bootstrap.min.css' );

    // ENQUEUE STYLES.
    wp_enqueue_style('stylesheet');
    wp_enqueue_style('bootstrap-css');
  }

  public function register_scripts() {
    // REGISTER SRCIPTS.
    wp_register_script('main-js', ALEXASTUDIOCREATION_DIR_URI . '/assets/main.js', [], filemtime( ALEXASTUDIOCREATION_DIR_PATH . '/assets/main.js' ), true );
    wp_register_script( 'bootstrap-js', ALEXASTUDIOCREATION_DIR_URI . '/assets/src/library/js/bootstrap.min.js', array( 'jquery' ), null, true );


    // ENQUEUE SCRIPTS.
    wp_enqueue_script('main-js');
    wp_enqueue_script('bootstrap-js');
  }
}
