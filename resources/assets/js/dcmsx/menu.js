$(document).ready(function () {

  $('.nav-menu li').hover(function (e) {
    e.stopPropagation();
    // $(this).children( 'ul' ).toggleClass('display');
    $(this).children( 'ul' ).addClass('display');
  });

  $( 'body' ).click(function () {
    $('.has-children > ul').removeClass('display');
  });
  
  $( '.has-children > a' ).click(function (e) {
    e.preventDefault();
  });


  $('.menu-btn').on('click', function(e) {
    e.preventDefault();
    $('.menu').toggleClass('menu_active');
    $('.container-fluid').toggleClass('content_active');

    $(this).toggleClass('menu-btn_active');
  })

});