// jQuery(document).ready(function ($) {
//   // Ajoutez une classe spécifique à l'image et au titre h2
//   $(".wp-block-media-text img, .wp-block-media-text h2").on('click', function () {
//     if ($(window).width() < 768) {
//       // Réduit l'opacité de tous les éléments img et h2 dans la même wp-block-media-text
//       var container = $(this).closest(".wp-block-media-text");
//       container.find("img, h2").css("opacity", "0");

//       // Réinitialise l'opacité du paragraphe (p) à 1
//       container.find("p").css("opacity", "1");
//     }
//   });

//   $(document).on('click', function (event) {
//     if ($(window).width() < 768) {
//       var clickedElement = $(event.target);

//       // Si l'élément cliqué n'est pas un élément cliquable ou une wp-block-media-text, réinitialise l'opacité à 1
//       console.log()
//       if (!clickedElement.hasClass("wp-block-media-text") && !clickedElement.closest(".wp-block-media-text").length) {
//         if ($(".wp-block-media-text img, .wp-block-media-text h2").css("opacity") === 1 )  {
//           $(".wp-block-media-text img, .wp-block-media-text h2").css("opacity", "0");
//           $(".wp-block-media-text p").css("opacity", "1");
//         }
//         else {
//           $(".wp-block-media-text img, .wp-block-media-text h2").css("opacity", "1");
//           $(".wp-block-media-text p").css("opacity", "0");
//         }
//       }
//     }
//   });
// });



jQuery(document).ready(function ($) {
  var previousId = null
  $(".entry-content-prestation .is-stacked-on-mobile").on('click', function (event) {
    var container = $(event.currentTarget);
    var currentId = container.attr('id');

    console.log(currentId)
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
