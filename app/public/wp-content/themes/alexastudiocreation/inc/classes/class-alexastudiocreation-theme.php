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
    $this->set_hooks();
  }

  protected function set_hooks() {
    //  actions and filters.
  }
}
