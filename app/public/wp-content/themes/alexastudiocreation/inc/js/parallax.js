jQuery(function($) {
  console.log('Parallax script loaded.');

  function initParallax() {
    const container = $('.parallax-container');
    const isContactPage = $('body').hasClass('page-contact');
    const isMobile = $(window).width() <= 767;

    if (isContactPage && !isMobile) {
      container.parallax({ imageSrc: '/wp-content/themes/alexastudiocreation/contact-background.png' });
    } else if (!isContactPage && !isMobile) {
      container.parallax({ imageSrc: '/wp-content/themes/alexastudiocreation/background.png' });
    } else if (isContactPage && isMobile) {
      container.css({ background: 'url("/wp-content/themes/alexastudiocreation/contact-background-mobile.png")' });
    } else if (!isContactPage && isMobile) {
      container.css({ background: 'url("/wp-content/themes/alexastudiocreation/background-small.png")' });
    }
  }

  initParallax();
  console.log('Parallax script finished.');
});
