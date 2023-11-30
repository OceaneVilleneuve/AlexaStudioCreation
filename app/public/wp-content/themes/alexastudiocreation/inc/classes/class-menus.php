<?php
/**
 * Register Menus
 *
 * @package Alexastudiocreation
 */

namespace ALEXASTUDIOCREATION_THEME\Inc;

use ALEXASTUDIOCREATION_THEME\Inc\Traits\Singleton;

class Menus {
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
    add_action('init', [$this, 'register_menus']);
  }

  public function register_menus() {
    register_nav_menus([
      'alexastudiocreation-header-menu' => esc_html__( 'Header Menu', 'AlexaStudioCreation' ),
      'alexastudiocreation-footer-menu' => esc_html__( 'Footer Menu', 'AlexaStudioCreation' ),
    ]);
  }
}
