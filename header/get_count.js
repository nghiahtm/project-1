// $(document).ready(
//     function () {
//         let textValue = $('#quantity').text();
//         let id = $('#id-product').val();
//         let count = parseInt(textValue,10);
//         console.log(textValue);
//         $('#cart').on('click',function (){
//             count++;
//             if(count <= 5){
//                 $.ajax({
//                     url: '../header/count_order.php',
//                     type: 'POST',
//                     data: {orders: count,id_product:id},
//                     dataType: 'json',
//                     success: function (response) {
//                         $("#quantity").text(response);
//                     },
//                 })
//             }else {
//                 alert('Bạn đang đặt số lượng lớn');
//             }
//         })
//     }
// )

$(document).ready(
    function () {
        let search = $('#search').val();
        console.log(search);
    }
)