jQuery(document).ready(function ($) {
  // Lorsqu'un sous-menu est affiché
  $('.collapse').on('shown.bs.collapse', function () {
    var icon = $(this).prev('.nav-link').find('.fa-solid');

    // Change l'icône du parent en fa-minus lorsqu'il est affiché
    icon.removeClass('fa-plus').addClass('fa-minus');
  });

  // Lorsqu'un lien enfant est cliqué
  $('.nav-link[data-bs-toggle="collapse"]').on('click', function () {
    var icon = $(this).find('.fa-solid');
    var collapseTarget = $($(this).attr('data-bs-target'));

    // Ferme tous les autres sous-menus
    $('.collapse.show').not(collapseTarget).collapse('hide');
    // Rétablit les icônes de tous les autres parents
    $('.nav-link[data-bs-toggle="collapse"]').not(this).find('.fa-solid').removeClass('fa-minus').addClass('fa-plus');

    // Change l'icône du parent en fa-minus lorsqu'il est affiché
    icon.toggleClass('fa-plus fa-minus');
  });
});
