$(document).ready(function () {

    $(".buy").click(function () {
        const productId = $(this).data('product-id');

        $.ajax({
            type: "POST",
            url: "/api/basket",
            data: {product_id: productId},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(msg){
                $('#myBasket').trigger('click');
            }
        });
    });

    // очищаем контент при закрытии модалки, что бы при следующем открытии он был обновлен
    $('#basket').on('hidden.bs.modal', function (e) {
        $(this).removeData('bs.modal');
    });
    
    $('select[name=region]').change(function (e) {
        const refRegion = $( this ).val();

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
                let options = '<option></option>';
                response.cities.forEach(function(item, i, arr) {
                    options += '<option value="' + item.Ref + '">' + item.DescriptionRu + '</option>';
                });
                $('select[name=cities]').removeProp('disabled').html(options);
                $('.cities').select2();
            }
        });
    });

    $('.confirm-phone-text').click(function () {
        const mobile = $('input[name=mobile]').val();
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
                let errorText = error.statusText;
                let timer = true;
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
        const refCity = $( this ).val();

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
                let options = '';
                response.offices.forEach(function(item, i, arr) {
                    options += '<option value="' + item.Ref + '">' + item.DescriptionRu + '</option>';
                });
                $('select[name=offices]').removeProp('disabled').html(options).fadeIn();
                $('.offices').select2();
            }
        });
    });
   
});