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

  public function get_menu_id( $location ) {
    // GET ALL THE LOCATIONS.
    $locations = get_nav_menu_locations();

    // GET OBJECT ID BY LOCATION.
    $menu_id = $locations[$location];

    return ! empty( $menu_id ) ? $menu_id : '';
  }

  public function get_child_menu_items( $menu_array, $parent_id ) {
    $child_menus = [];

    if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {
      foreach ( $menu_array as $menu ) {
        if ( intval( $menu->menu_item_parent ) === $parent_id ) {
          array_push( $child_menus, $menu );
        }
      }
    }
    return $child_menus;
  }
}
