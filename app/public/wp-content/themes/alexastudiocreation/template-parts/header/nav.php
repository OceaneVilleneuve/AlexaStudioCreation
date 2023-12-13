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
<button class="nav-button-placement btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">
  <i class="fa-solid fa-bars nav-bar-icon"></i>
</button>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
  <div class="offcanvas-body">
    <button type="button" class="btn-close text-reset button-custom-nav-open" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="container">

      <?php
      if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
        ?>
          <ul class="ul-nav">
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
                      <i class="fa-solid fa-plus icon-menu-plus"></i>
                      <?php echo esc_html($menu_item->title); ?>
                      </a>
                      <!-- Child Menu -->
                      <div class="collapse" id="childMenu<?php echo $menu_item->ID; ?>">
                      <!-- AJOUTER JS POUR LE  MOINS QUAND ACTIF -->
                        <?php
                        foreach ($child_menu_items as $child_menu_item) {
                          ?>
                            <a class="nav-link" id="nav-link-child" href="<?php echo esc_url($child_menu_item->url); ?>">
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
          <!--  SOCIAL MEDIA -->
          <div class="mt-4">
            <a href="https://www.instagram.com/alexa_studio_creation/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank" class="social-media-icons">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com/Alexastudiocreation" target="_blank" class="social-media-icons">
              <i class="fa-brands fa-square-facebook"></i>
            </a>
          </div>
        </ul>
        <?php
      }
      ?>
    </div>
  </div>
</div>
