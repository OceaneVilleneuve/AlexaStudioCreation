jQuery(document).ready(function($) {
  console.log('Parallax script loaded.');

  function initParallax() {
    const container = $('.parallax-container');
    const isContactPage = $('body').hasClass('page-id-48');
    const isReservationSuccessPage = $('body').hasClass('page-id-369');

    if (isContactPage || isReservationSuccessPage ) {
      container.parallax({ imageSrc: '/wp-content/themes/alexastudiocreation/contact-background.png' });
      container.css('padding-bottom', '250px')
    } else {
      container.parallax({ imageSrc: '/wp-content/themes/alexastudiocreation/background.png' });
    }

  }

  initParallax();
  console.log('Parallax script finished.');
});
