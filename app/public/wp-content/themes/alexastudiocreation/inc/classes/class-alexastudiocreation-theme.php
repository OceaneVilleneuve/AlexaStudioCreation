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
    Menus::get_instance();

    $this->setup_hooks();
  }

  protected function setup_hooks() {


    /**
     * Actions.
     */
    add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
  }

  public function setup_theme() {
    // error_log('Hello');

    add_theme_support( 'title-tag' );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support(
      'html5',
      [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
      ]
    );

    add_editor_style();
    add_theme_support( 'wp-block-styles' );

    /**
     * Register image sizes.
     */
    add_image_size( 'featured-large', 353, 233, true );

    add_theme_support( 'align-wide' );

    global $content_width;
    if ( ! isset( $content_width ) ) {
      $content_width = 1240;
    }
  }
}
