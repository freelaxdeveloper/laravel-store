$(document).ready(function () {

  $('.nav-menu li').hover(function (e) {
    e.stopPropagation();
    // $(this).children( 'ul' ).toggleClass('display');
    $(this).children( 'ul' ).addClass('display');
  });

  $( 'body' ).click(function () {
    console.log('click');
    $('.has-children > ul').removeClass('display');
  });
  
  $( '.has-children > a' ).click(function (e) {
    e.preventDefault();
  });

});