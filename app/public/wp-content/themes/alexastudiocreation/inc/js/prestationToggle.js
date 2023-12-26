
jQuery(document).ready(function ($) {
  var previousId = null
  $(".entry-content-prestation .is-stacked-on-mobile").on('click', function (event) {
    var container = $(event.currentTarget);
    var currentId = container.attr('id');

    // console.log(currentId)
     // Comparer l'ID actuel avec l'ID précédent
      if ((currentId !== previousId) || (event.currentTarget.classList.contains('flipped-card'))) {
      // Supprimer la classe 'flipped-card' de tous les éléments sauf celui actuellement cliqué
      $(".entry-content-prestation .wp-block-media-text").not(container).removeClass('flipped-card');

      // Ajouter ou supprimer la classe 'flipped-card' de l'élément actuellement cliqué
      container.toggleClass('flipped-card');

      // Mettre à jour l'ID précédent
      previousId = currentId;
    }
    else {
      event.currentTarget.classList.add('flipped-card');
    }
  });
});
