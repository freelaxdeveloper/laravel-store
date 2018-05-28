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
    
});