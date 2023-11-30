<?php
/**
 * Header Navigation template.
 *
 * @package Alexastudiocreation
 */

$menu_class = \Alexastudiocreation_Theme\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'alexastudiocreation-header-menu' );

//  GET ALL THE MENU ITEMS.
$header_menus = wp_get_nav_menu_items( $header_menu_id );

// PRINT ALL THE MENU ITEMS.
// echo '<pre>';
// print_r( $header_menus );
// wp_die();

?>
<button class="text-dark btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php
    if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
      ?>
        <ul class="">
          <?php
            foreach ( $header_menus as $menu_item ) {
              if ( ! $menu_item->menu_item_parent ) {

                $child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
                $has_children = ! empty( $child_menu_items ) && is_array( $child_menu_items );

                if ( ! $has_children ) {
                  ?>
                  <!-- Parent Menu -->
                  <li>
                    <a class="nav-link" href="<?php echo esc_url( $menu_item->url ); ?>">
                      <?php echo esc_html( $menu_item->title ); ?>
                    </a>
                  </li>
                  <?php
                } else {
                  ?>
                  <!-- Parent Menu with Toggler -->
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>" data-bs-toggle="collapse" data-bs-target="#childMenu<?php echo $menu_item->ID; ?>">
                      <?php echo esc_html($menu_item->title); ?>
                    </a>
                    <!-- Child Menu -->
                    <div class="collapse" id="childMenu<?php echo $menu_item->ID; ?>">
                      <?php
                      foreach ($child_menu_items as $child_menu_item) {
                        ?>
                        <a class="nav-link" href="<?php echo esc_url($child_menu_item->url); ?>">
                          <?php echo esc_html($child_menu_item->title); ?>
                        </a>
                        <?php
                      }
                      ?>
                    </div>
                  </li>
                  <?php
                }
              ?>
              <?php
            }
          }
        ?>
      </ul>
      <?php
    }
    ?>
  </div>
</div>
