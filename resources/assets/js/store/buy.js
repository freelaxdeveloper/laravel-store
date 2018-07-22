$(document).ready(function () {
  $('.delete-item').click(function () {
    var productId = $(this).data('product-id');

    var ob = {product_id: productId};
    swal({
        title: "Вы серьезно?",
        text: "Подтвердите удаление, но прежде подумайте еще раз, стоит ли отказыватся от качественной мебели.",
        icon: "warning",
        buttons: ["Продолжить покупки", "Удалить из корзины"],
        dangerMode: true,
    })
    .then(function(willDelete) {
      if (willDelete) {

        fetch('/api/basket/delete', { 
          method: 'POST', 
          credentials: 'same-origin',
          headers: { 
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }, 
          body: JSON.stringify(ob),
        }).then(function(results) {
          return results.json();
        }).then(function(json) {
            $('.basket-counter').html(json.count);
            $('.basket-sum').html(new Intl.NumberFormat('en-IN').format(json.count_sum));
            swal("Нам не хотелось, но мы удалили наш товар с Вашей корзины", {
                icon: "success",
            });
            $('.itemBasket' + productId).fadeOut(300);
        });
          
      }
    });

    

  });

  $('.edit-item').click(function () {
    swal("Введите количество товара", {
      content: "input",
      icon: "success",
    })
    .then(function(value) {
      swal('Вам будет доставлено: ' + value + 'шт.');
    });
  });

  $('.icon-like').click(function() {
    var productId = $(this).data('product-id');
    swal("Успешно!", "Приятно что наша мебель нравится Вам!", "success", {
      button: "Вернутся",
    });
    $(this).remove();
    return false;
  });

    $(".buy").click(function () {
        var productId = $(this).data('product-id');
        console.log('productId', productId);
        $.ajax({
            type: "POST",
            url: "/api/basket",
            data: {product_id: productId},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(msg){
                console.log('msg', msg);
                	swal({
                    html: true,
                    title: "Отлично! ",
                    text: '"' + msg.product.title + '" добавлен в Вашу корзину, теперь можно оформить покупку!',
                    icon: msg.product.screen.src,
                    buttons: {
                      cancel: "Продолжить покупки",
                      catch: {
                        text: "Оформить заказ",
                        value: "catch",
                      },
                    },
                  }).then(function(value) {
                    switch (value) {
                      case "catch":
                        swal("Тут будет перенаправление на оформление заказа");
                      break;
                    }
                  });
                  $('.itemBasket' + msg.product.id).remove();
                $('.dropdown-cart-product-list').append('\
                  <li class="item clearfix itemBasket' + msg.product.id + '">\
                    <figure>\
                      <a href="/product/view/' + msg.product.slug + '"><img alt="phone 4" src="' + msg.product.screen.src + '"></a>\
                    </figure>\
                    <div class="dropdown-cart-details">\
                      <p class="item-name"><a href="/product/view/' + msg.product.slug + '">' + msg.product.title + '</a></p>\
                      <p>1x <span class="item-price">&#8372;' + new Intl.NumberFormat('en-IN').format(msg.product.price) + '</span></p>\
                    </div>\
                  </li>\
                ');
                $('.basket-counter').html(msg.countOrders);
                $('.basket-sum').html(new Intl.NumberFormat('en-IN').format(msg.orders.count_sum));

                //$('#myBasket').trigger('click');
                
            }
        });
    });


    // очищаем контент при закрытии модалки, что бы при следующем открытии он был обновлен
    $('#basket').on('hidden.bs.modal', function (e) {
        console.log('=)');
        $(this).removeData('bs.modal');
        return false;
    });
    
    $('select[name=region]').change(function () {
        var refRegion = $( this ).val();

        console.log('=)', refRegion);
        $.ajax({
            type: "POST",
            url: "/api/np/cities",
            data: {refRegion: refRegion},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                dcmsx.loaderShow('label[for=cities]');
            },
            complete: function(){
                dcmsx.loaderHide();
            },
            success: function(response){
                var options = '<option></option>';
                response.cities.forEach(function(item, i, arr) {
                    options += '<option value="' + item.Ref + '">' + item.DescriptionRu + '</option>';
                });
                $('select[name=cities]').removeProp('disabled').html(options);
                $('.cities').select2();
            }
        });
    });

    $('.confirm-phone-text').click(function () {
        var mobile = $('input[name=mobile]').val();
        var current = $( this );

        $.ajax({
            type: "POST",
            url: "/api/sms/code",
            data: {mobile: mobile/* , captcha: grecaptcha.getResponse() */},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                dcmsx.loaderShow('.confirm-phone-text', 'timerLoader');
            },
            complete: function(){
                //dcmsx.loaderHide('timerLoader');
            },
            success: function(response){
                if ( !response.error ) {
                    current.fadeOut();
                    dcmsx.msg(current, response.success);
                    dcmsx.timer('.success', 60, function () {
                        dcmsx.loaderHide('timerLoader');
                        dcmsx.clearMsg();
                        current.fadeIn().html('[<span>отправить повторно</span>]');
                    });
                } else {
                    dcmsx.loaderHide('timerLoader');
                    dcmsx.err(current, response.error);
                }
            },
            error: function (error) {
                var errorText = error.statusText;
                var timer = true;
                if ( typeof(error.responseJSON.errors) != 'undefined') {
                    errorText = error.responseJSON.errors['captcha'];
                    timer = false;
                }
                dcmsx.loaderHide('timerLoader');
                $('.seconds').remove();
                dcmsx.err(current, errorText);
                if ( timer ) {
                    dcmsx.timer('.error', 60, function () {
                        dcmsx.loaderHide('timerLoader');
                        dcmsx.clearMsg();
                    });
                }
                
            }
        });


    });
    
    $('select[name=cities]').change(function (e) {
        var refCity = $( this ).val();

        $.ajax({
            type: "POST",
            url: "/api/np/offices",
            data: {refCity: refCity},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                dcmsx.loaderShow('label[for=offices]');
            },
            complete: function(){
                dcmsx.loaderHide();
            },
            success: function(response){
                var options = '';
                response.offices.forEach(function(item, i, arr) {
                    options += '<option value="' + item.Ref + '">' + item.DescriptionRu + '</option>';
                });
                $('select[name=offices]').removeProp('disabled').html(options).fadeIn();
                $('.offices').select2();
            }
        });
    });
   
});