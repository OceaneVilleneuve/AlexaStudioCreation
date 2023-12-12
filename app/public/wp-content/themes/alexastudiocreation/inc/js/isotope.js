jQuery(document).ready(function($) {
  var $grid = $('.front-page-content .grid').isotope({
      itemSelector: '.col-lg-4',
      layoutMode: 'fitRows'
  });

  $grid.imagesLoaded().progress(function() {
      $grid.isotope('layout');
  });
});
