<?php
/**
 * Bootstraps the Theme.
 *
 * @package Alexastudiocreation
 */

namespace ALEXASTUDIOCREATION_THEME\Inc;

use ALEXASTUDIOCREATION_THEME\Inc\Traits\Singleton;

class ALEXASTUDIOCREATION_THEME {
  use Singleton;

  // THERE ARE PROTECTED FUNCTIONS:
  protected function __construct() {
    // wp_die('Hello');

    //  load class.

    Assets::get_instance();

    $this->setup_hooks();
  }

  protected function setup_hooks() {

    /**
     * Actions.
     */
    add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
  }

  public function setup_theme() {
    add_theme_support( 'title-tag' );

  }
}
