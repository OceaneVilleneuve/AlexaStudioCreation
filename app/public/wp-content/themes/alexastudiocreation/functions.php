<?php

// Créer une page de paramètre personnalisé

function alexastudiocreation_add_admin_pages() {
  add_menu_page('Paramètre du thème Alexa studio création', 'AlexaStudioCreation', 'manage_options', 'alexastudiocreation-settings', 'alexastudiocreation_theme_settings', 'dashicons-admin-settings', 60);
}


// Dans la fonction de rappel de notre page de réglages, placer un élément <form>  qui va pointer vers options.php
// et qui va envoyer ses données en POST  .
// Options.php  est un fichier d'administration (déjà existant) qui gère la soumission des formulaires de paramètres des plugins
// et des thèmes. Utiliser l'action options.php  pour traiter les données soumises par le formulaire.


function alexastudiocreation_theme_settings() {
  echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';

  echo '<form action="options.php" method="post" name="alexastudiocreation_settings">';

  echo '<div>';

  settings_fields('alexastudiocreation_settings_fields');

  do_settings_sections('alexastudiocreation_settings_section');

  submit_button();

  echo '</div>';

  echo '</form>';

}

add_action('admin_menu', 'alexastudiocreation_add_admin_pages');



// Ajouter un paramètre Introduction à notre page
// Ici, on demande à ce que la fonction alexastudiocreation_settings_fields_validate()  soit appelée pour nettoyer et adapter les valeurs de nos réglages

function alexastudiocreation_settings_register() {
    register_setting('alexastudiocreation_settings_fields', 'alexastudiocreation_settings_fields', 'alexastudiocreation_settings_fields_validate');
    add_settings_section('alexastudiocreation_settings_section', __('Paramètres', 'alexastudiocreation'), 'alexastudiocreation_settings_section_introduction', 'alexastudiocreation_settings_section');
    // add_settings_field ajoute un nouveau champs
    add_settings_field('alexastudiocreation_settings_field_introduction', __('Introduction', 'alexastudiocreation'), 'alexastudiocreation_settings_field_introduction_output', 'alexastudiocreation_settings_section', 'alexastudiocreation_settings_section');
  }


function alexastudiocreation_settings_section_introduction() {
  echo __('Paramètrez les différentes options de votre thème AlexaStudioCreation.', 'alexastudiocreation');
  }
// Puis, la fonction add_settings_section()  permet de créer une section pour ranger nos réglages.
//   - identifiant de la section ;
//   - un titre ;
//   - une fonction de rappel pour afficher du HTML spécifique ;
//   - et la page à laquelle appartient la section.

function alexastudiocreation_settings_field_introduction_output() {
  $value = get_option('alexastudiocreation_settings_field_introduction');

  echo '<input name="alexastudiocreation_settings_field_introduction" type="text" value="'.$value.'" />';
  }
// get_option()  pour récupérer la valeur du champ

function alexastudiocreation_settings_fields_validate($inputs) {
  if(isset($_POST) && !empty($POST)) {
    if(!empty($_POST['alexastudiocreation_settings_field_introduction']))
    {
      update_option('alexastudiocreation_settings_field_introduction',
      $_POST['alexastudiocreation_settings_field_introduction']);
    }
  }

  return $inputs;
}


// *** ACTIONS ***
add_action('admin_menu', 'alexastudiocreation_settings_register', 10);
add_action('admin_init', 'alexastudiocreation_settings_register');

// add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() )


// ^ Permet de déclarer un nouveau champ en passant :
//    - un identifiant
//    - un titre
//    - une fonction de rappel pour afficher l'HTML nécessaire
//    - ainsi que l'identifiant de la page et de la section auxquelles il appartient.
?>
