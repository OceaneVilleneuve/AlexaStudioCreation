
jQuery(document).ready(function ($) {
  $('.wp-block-media-text.is-stacked-on-mobile').each(function (index) {
    var uniqueID = index;
    $(this).attr('id', uniqueID);
  });
});
