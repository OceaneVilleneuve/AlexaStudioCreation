jQuery(document).ready(function($) {
  console.log('Parallax script loaded.');

  function initParallax() {
    const container = $('.parallax-container');
    const isContactPage = $('body').hasClass('page-id-48.parallax-container');

    if (isContactPage) {
      container.parallax({ imageSrc: '/wp-content/themes/alexastudiocreation/contact-background.png' });
    } else {
      container.parallax({ imageSrc: '/wp-content/themes/alexastudiocreation/background.png' });
    }
  }

  initParallax();
  console.log('Parallax script finished.');
});
