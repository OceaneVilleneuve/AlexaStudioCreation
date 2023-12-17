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
  $(".entry-content-prestation  .wp-block-media-text").on('click', function (event) {
    var container = $(event.currentTarget);
    if(event.currentTarget.classList.contains('flipped-card')) {
      $(".entry-content-prestation  .wp-block-media-text").removeClass('flipped-card')
    }
    else {
      event.currentTarget.classList.add('flipped-card');
    }
  });
});