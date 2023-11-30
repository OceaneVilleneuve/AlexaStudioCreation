<?php
/**
 * Header Navigation template.
 *
 * @package Alexastudiocreation
 */

?>


<!-- NAVBAR CODE CSS OU BOOTSTRAP-->


<?php
wp_nav_menu(
  [
    'theme_location' => 'alexastudiocreation-header-menu',
    'container_class' => 'my_extra_menu'
  ]
)
?>
