<?php
include_once "../database/db_helper.php";
session_start();

$id_user = $_SESSION['user_info']['id'];
$order = $_GET['order'];
if (empty($order)) {
    $dataHistory = responseData("Select * from orders where id_user='$id_user'and type_order !='0' order by order_date desc ");
} else {
    $dataHistory = responseData("Select * from orders where id_user='$id_user'and type_order ='$order' order by order_date desc");
}

if (isset($_POST['remove'])) {
    $code = $_POST['create'];
    $typeData = responseData("Select type_order from orders where id_user='$id_user'and code_orders ='$code'");
    $type = $typeData[0]['type_order'];
    if ($type === '1') {
        responseData("update orders set type_order = '8' where id_user='$id_user'and code_orders= '$code'");
    } else {
        header('location: cancel.php?error=1');
    }
}

if (isset($_POST['success_products'])) {
    $code = $_POST['create'];
    responseData("update orders set type_order = '6' where id_user='$id_user'and code_orders= '$code'");
}
function billsUser($dataHistory)
{
    $bills = array();
    if (empty($dataHistory)) {
        return array();
    }
    foreach ($dataHistory as $item) {
        $bills[$item['code_orders']][] = $item;
    }
    return $bills;
}

function totalBill($date)
{
    $ordersUser = getOrderUser($date, 'count_order,id_product');
    $sum = 0;
    foreach ($ordersUser as $order) {
        $price = responseData("Select price from products where id_product=" . $order['id_product'])[0]['price'];
        $sum += $order['count_order'] * $price;
    }
    return $sum;
}

function totalCount($date)
{
    $ordersUser = getOrderUser($date, 'count_order');
    $sum = 0;
    foreach ($ordersUser as $order) {
        $sum += $order['count_order'];
    }
    return $sum;
}

function getProducts($date)
{
    $ordersUser = getOrderUser($date, 'count_order,id_product');
    $products = [];
    $countOrder = [];
    foreach ($ordersUser as $order) {
        $products[] = responseData("Select price,link_image,name_product,id_product from products 
                                     where id_product=" . $order['id_product'])[0];
        $countOrder[] = $order['count_order'];
    }
    return array(
        'products' => $products,
        'counts' => $countOrder
    );
}

function getTypeOrder($code)
{
    $id_user = $_SESSION['user_info']['id'];
    $typeOrder =
        responseData("SELECT type_order FROM orders
                  where code_orders = '$code' and id_user = '$id_user'
                  group by type_order")[0]['type_order'];
    return configTypeOrder($typeOrder);
}

function configTypeOrder($type)
{
    switch ($type) {
        case "1":
            return "Đang xử lý";
        case '2':
            return "Xác nhận thanh toán thành công";
        case '3':
            return "Đang lấy hàng";
        case '4':
            return "Đang vận chuyển";
        case '5':
            return "Vận chuyển thành công";
        case '6':
            return "Đã lấy hàng";
        case '7':
            return "Nhận hàng";
        case '8':
            return "Đang chờ huỷ";
        case '9':
            return "Đã huỷ";
        default:
            return "";
    }
}

function getOrderUser($code, $typeQuery, $typeOrder = null)
{
    $id_user = $_SESSION['user_info']['id'];
    if (is_null($typeOrder)) {
        return responseData("Select $typeQuery from orders where id_user='$id_user' and code_orders = '$code' order by order_date");
    }
    return responseData("Select $typeQuery from orders where id_user='$id_user' and code_orders = '$code' 
                           and type_order='$typeOrder'order by order_date desc");
}
