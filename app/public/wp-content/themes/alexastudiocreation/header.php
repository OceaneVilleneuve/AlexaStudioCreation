<?php
/**
* Header template.
*
* @package Alexastudiocreation
*/
?>

<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <? wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
}
?>

<div id="page" vlas="site">
  <header id="masthead" class="site-header" role="banner">
    <?php get_template_part( 'template-parts/header/nav' ); ?>
  </header>
  <div id="content" class="site-content">
