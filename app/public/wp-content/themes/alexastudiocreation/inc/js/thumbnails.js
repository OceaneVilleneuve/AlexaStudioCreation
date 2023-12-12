
// FUNCTION QUI PERMET LE DOUBLE CLIQUE SUR LES PHOTOS EN MOBILE
jQuery(document).ready(function($) {
  var clickCount = 0; // Variable pour compter les clics
  var delay = 5000; // Délai en millisecondes (1000 millisecondes = 1 seconde)
  var timeout;
  var lastClickedIndex = -1; // Index du dernier thumbnail cliqué

  var $grid = $('.front-page-content .grid').isotope({
    itemSelector: '.col-lg-4',
    layoutMode: 'fitRows'
  });

  $grid.imagesLoaded().progress(function() {
    $grid.isotope('layout');
  });

  // Ajoutez un gestionnaire de clic aux thumbnails sur mobile
  $('.thumbnail-container').on('click', function(e) {
    if ($(window).width() <= 767) { // Vérifie la largeur de l'écran
      e.preventDefault(); // Empêche le comportement de clic par défaut (ouverture du lien)

      var currentClickedIndex = $(this).index('.thumbnail-container');

      // Si un autre thumbnail (quatrième thumbnail) a été cliqué pendant le délai, réinitialise le compteur
      if (clickCount > 0 && currentClickedIndex !== lastClickedIndex) {
        clearTimeout(timeout);
        clickCount = 0;
        console.log('Compteur réinitialisé en raison d\'un autre clic pendant le délai.');
      }

      lastClickedIndex = currentClickedIndex; // Met à jour l'index du dernier clic

      // Réinitialise le compteur et le timeout à chaque clic
      clearTimeout(timeout);
      clickCount++;

      if (clickCount === 1) {
        console.log('Premier clic');
        // Attend le délai spécifié
        timeout = setTimeout(function() {
          console.log('Compteur réinitialisé.');
          clickCount = 0;
        }, delay);
      }

      // Si le compteur atteint 2, ouvre le lien
      if (clickCount === 2) {
        var thumbnailLink = $(this).attr('href');
        if (thumbnailLink) {
          console.log('Ouverture du lien après le délai...');
          window.location.href = thumbnailLink;
        }
      }
    }
  });
});
