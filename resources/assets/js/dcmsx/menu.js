$(document).ready(function () {

  $('.nav-menu li').hover(function (e) {
    e.stopPropagation();
    // $(this).children( 'ul' ).toggleClass('display');
    $(this).children( 'ul' ).addClass('display');
  });

  $('.nav-menu li').click(function (e) {
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
  });


/* isNumberKey
    Only allows NUMBERS to be keyed into a text field.
    @environment ALL
    @param evt - The specified EVENT that happens on the element.
    @return True if number, false otherwise.
*/
function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	// Added to allow decimal, period, or delete
	if (charCode == 110 || charCode == 190 || charCode == 46) 
		return true;
	
	if (charCode > 31 && (charCode < 48 || charCode > 57)) 
		return false;
	
	return true;
} // isNumberKey

// Price slider
var startValue = 500;
var endValue = 15000;
var minValue = 100;
var maxValue = 20000;

if (localStorage.getItem('minPrice')) {
  startValue = localStorage.getItem('minPrice');
}
if (localStorage.getItem('maxPrice')) {
  endValue = localStorage.getItem('maxPrice');
}
  $("#slider-container").slider({
    range: true,
    min: minValue,
    max: maxValue,
    values: [startValue, endValue],
    create: function(){
      $("#amount-from").val(startValue);
      $("#amount-to").val(endValue);
    },
    slide: function(event, ui){
      $("#amount-from").val(ui.values[0]);
      $("#amount-to").val(ui.values[1]);
      var from = $("#amount-from").val();
      var to = $("#amount-to").val();
      console.log( from + " --- " + to );
    }
  });

$('.btn-filter').click(function(e) {
  e.preventDefault();
  var from = $("#amount-from").val();
  var to = $("#amount-to").val();

  localStorage.setItem('minPrice', from);
  localStorage.setItem('maxPrice', to);

  function getParams(query) {
    if (!query) {
      return { };
    }
  
    return (/^[?#]/.test(query) ? query.slice(1) : query)
      .split('&')
      .reduce(function(params, param) {
        // let [ key, value ] = param.split('=');
        // console.log('key', key);
        // console.log('value', value);
        // console.log('split', param.split('='));
        params[param.split('=')[0]] = param.split('=')[1] ? decodeURIComponent(param.split('=')[1].replace(/\+/g, ' ')) : '';
        return params;
      }, { });
  };
  var test2 = getParams(window.location.search);
  test2.maxPrice = to;
  test2.minPrice = from;
  var locationPath = '';
  JSON.parse(JSON.stringify(test2), function (key, value) {
    if (typeof value == 'string') {
      locationPath = locationPath + key + '=' + value + '&';
    }    
  });
  window.location.href = '?' + locationPath;
});


});
