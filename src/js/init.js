var wow = new WOW({
  boxClass: 'js-wow',
  mobile: false
});

$(document).ready(function() {
  wow.init();

  $('.fa-bars').on('click', function() {
    $('.nav').addClass('js-nav-open');
    $('.nav__aside').addClass('js-nav-open');
  });

  $('.fa-times').on('click', function() {
    $('.nav').removeClass('js-nav-open');
    $('.nav__aside').removeClass('js-nav-open');
  });
});
