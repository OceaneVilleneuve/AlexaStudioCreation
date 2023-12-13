<?php
/**
 * Theme Functions.
 *
 * @package Alexastudiocreation
 */

// ABSOLUTE PATH OF THEME :
if (!defined('ALEXASTUDIOCREATION_DIR_PATH')) {
    define('ALEXASTUDIOCREATION_DIR_PATH', untrailingslashit(get_stylesheet_directory()));
}

if (!defined('ALEXASTUDIOCREATION_DIR_URI')) {
    define('ALEXASTUDIOCREATION_DIR_URI', untrailingslashit(get_stylesheet_directory_uri()));
}

// Chargement des fichiers d'aide
require_once ALEXASTUDIOCREATION_DIR_PATH . '/inc/helpers/autoloader.php';
require_once ALEXASTUDIOCREATION_DIR_PATH . '/inc/helpers/template-tags.php';

// Appel de l'instance Singleton
function alexastudiocreation_get_theme_instance() {
    \ALEXASTUDIOCREATION_THEME\Inc\ALEXASTUDIOCREATION_THEME::get_instance();
}

add_action('after_setup_theme', 'alexastudiocreation_get_theme_instance');

// Enqueue des scripts
function add_parallax_script() {
    wp_enqueue_script('parallax', 'https://cdnjs.cloudflare.com/ajax/libs/parallax.js/1.5.0/parallax.min.js', array('jquery'), null, true);
    wp_enqueue_script('parallax-config', get_stylesheet_directory_uri() . '/inc/js/parallax.js', array('jquery'), null, true);
}

function add_isotope_script() {
    wp_enqueue_script('isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), null, true);
    wp_enqueue_script('cloudflare', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js', array('jquery'), null, true);
    wp_enqueue_script('isotope-config', get_stylesheet_directory_uri() . '/inc/js/isotope.js', array('jquery'), null, true);
}

function add_thumbnails_script_for_mobile() {
    wp_enqueue_script('thumbnails-config', get_stylesheet_directory_uri() . '/inc/js/thumbnails.js', array('jquery'), null, true);
}

function add_toogle_script_for_menu() {
    wp_enqueue_script('toggle-config', get_stylesheet_directory_uri() . '/inc/js/toggle.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'add_parallax_script');
add_action('wp_enqueue_scripts', 'add_isotope_script');
add_action('wp_enqueue_scripts', 'add_thumbnails_script_for_mobile');
add_action('wp_enqueue_scripts', 'add_toogle_script_for_menu');
