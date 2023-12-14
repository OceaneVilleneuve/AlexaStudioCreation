jQuery(document).ready(function($) {
  // Assurez-vous que votre grille d'images a une classe, par exemple, "grid"
  $('.grid').isotope({
      // Options de configuration d'Isotope
      itemSelector: '.grid-item',
      layoutMode: 'fitRows'
  });
  console.log('hello');
});
