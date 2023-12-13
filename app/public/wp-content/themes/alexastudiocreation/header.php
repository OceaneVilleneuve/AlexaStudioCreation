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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Galada&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="parallax-container">

  <?php
  if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  }
  ?>

  <div id="page" class="site">
    <div class="d-flex justify-content-sm-between">
      <header id="masthead" class="site-header" role="banner">
        <?php get_template_part( 'template-parts/header/nav' ); ?>
      </header>
      <div class="margin-title-header">
        <!-- LINK RENVOI A LA HOME -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="link-to-home">Alexa Studio Création</a>
        <p class="sub-title-header">Photographe - Vidéaste </p>
      </div>
      <span></span>
    </div>
    <div id="content" class="site-content">
