
jQuery(document).ready(function($) {
  // Vérifier si l'écran est plus grand que 767 pixels (taille mobile)
  if ($(window).width() > 767) {
    // Ajouter une classe pour le parallaxe à l'élément que vous souhaitez animer
    $('.parallax-container').parallax({
      imageSrc: '/wp-content/themes/alexastudiocreation/background.png'
    });
  } else {
    // Charger une image différente pour les mobiles
    $('.parallax-container').css({
      imageSrc: '/wp-content/themes/alexastudiocreation/background-small.png'
    });
  }
});
