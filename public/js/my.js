$(document).ready(function () {
    let origin = location.origin;
    $('.delete-food').click(function () {
        console.log(1);
        if (confirm('Bạn chắc chắn muốn xóa?')) {
            let idFood = $(this).attr('data-id');
            $.ajax({
                url: origin + '/foods/' + idFood + '/destroy',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    alert(res);
                    $('#food-' + idFood).remove();
                },
                error: function (error) {
                }
            })
        }
    });
    $('.addToCart').click(function () {
        let urlCart = $(this).data('url');

        $.ajax({
            type: 'GET',
            url: urlCart,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                if (data.code === 200) {

                    $('#cartQty').html( data.totalQuantity);

                    alertify.success('Đã Thêm Vào Giỏ Hàng');

                }

            },
            error: function () {

            }
    })
    });


    $('.cart_update').click(function () {

        let id = $(this).data('id');
        let quantity = $('.quantity-update-' + id).val();
        $.ajax({
            type: 'GET',
            url: origin + '/cart/updateCart',
            data: {id: id, quantity: quantity},
            success: function (data) {
                $('#cartQty').html( data.totalProduct);
                $('#total-quantity-cart').html( data.totalProduct);
                $('#total-price-cart').html( data.totalPrice);


                    alertify.success('Cập Nhật Thành Công');

            },
            error: function () {

            }
        })
    });




    $('.cart_delete').click(function () {

        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: origin + '/cart/deleteCart',
            data: {id: id},
            success: function (data) {
                $('#product-cart-'+id).remove();
                $('#cartQty').html( data.totalProduct);
                $('#total-quantity-cart').html( data.totalProduct);
                $('#total-price-cart').html( data.totalPrice);


                    alertify.success('Xoá Thành Công Sản Phẩm');
            },
            error: function () {

            }
        })
    });



});
