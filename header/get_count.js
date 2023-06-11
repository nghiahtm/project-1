$(document).ready(
    function () {
        let textValue = $('#quantity').text();
        let id = $('#id-product').val();
        let count = parseInt(textValue, 10);
        $('#cart').on('click', function () {
           callDataOrder(count,id);
        })
    }
)

$(document).ready(
    function () {
        let name = $('#name-user').text();
        let id = $('#id-product').val();
        let textValue = $('#quantity').text();
        let count = parseInt(textValue, 10);
        $('#buy-now').on('click', function () {
            $.ajax({
                url: '../buy_page/buy_controller.php',
                type: 'POST',
                data: {id_product: id,user: name},
                success: function (response) {
                    if (response === "login") {
                        alert("Đăng nhập để mua hàng")
                    }else {
                        callDataOrder(count,id)
                    }
                }
            })
        });
    }
)

function callDataOrder(count,id) {
    count++;
    if (count <= 5) {
        $.ajax({
            url: '../header/count_order.php',
            type: 'POST',
            data: {orders: count, id_product: id},
            success: function (response) {
                $("#quantity").text(response);
            },
        })
    }
}