jQuery(document).ready(function($) {
  console.log('Seasons script loaded.');

  function initSeasons() {
    const container = $('.custom-button-for-home');
    const date = new Date();
    const month = date.getMonth() + 1; // Les mois vont de 0 à 11


    if (month >= 3 && month <= 5) {
      container.css('background-image', 'url("/wp-content/themes/alexastudiocreation/giphy-13.gif")');
    } else if (month >= 6 && month <= 8) {
      container.css('background-image', 'url("/wp-content/themes/alexastudiocreation/giphy-5.gif")');
    } else if (month >= 9 && month <= 11) {
      container.css('background-image', 'url("/wp-content/themes/alexastudiocreation/giphy-10.gif")');
    } else {
      container.css('background-image', 'url("/wp-content/themes/alexastudiocreation/giphy-12.gif")');
    }

  }




  initSeasons();
});
