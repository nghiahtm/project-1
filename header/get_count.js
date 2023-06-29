$(document).ready(
    function () {
        let textValue = $('#quantity').text();
        let id = $('#id-product').val();
        let count = parseInt(textValue, 10);
        $('#cart').on('click', function () {
            count++;
            callDataOrder(count, id);
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
                url: '../detail_product/buy_controller.php',
                type: 'POST',
                data: {id_product: id, user: name},
                success: function (response) {
                    if (response === "login") {
                        alert("Đăng nhập để mua hàng")
                    } else {
                        count = response;
                        console.log(count);
                        if (response < 3) {
                            count++;
                            callDataOrder(count, id);
                            window.location.href = '../orders/order.php';
                        } else {
                            alert("Bạn chỉ mua tối đa 3 hàng");
                        }
                    }
                }
            })
        });
    }
)

function callDataOrder(count, id) {
    if (count <= 3) {
        $.ajax({
            url: '../header/count_order.php',
            type: 'POST',
            data: {orders: count, id_product: id},
            success: function (response) {
                $("#quantity").text(response);
            },
        })
    } else {
        alert("Bạn chỉ mua tối đa 3 hàng");
    }
}