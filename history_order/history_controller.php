<?php
include_once "../database/db_helper.php";
session_start();

$id_user = $_SESSION['user_info']['id'];
$dataHistory = responseData("Select order_date from orders where id_user='$id_user'and type_order='1'");

function billsUser($dataHistory)
{
    $bills = array();
    if (empty($dataHistory)) {
        return array();
    }
    foreach ($dataHistory as $item) {
        $bills[$item['order_date']][] = $item;
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
    $product = [];
    foreach ($ordersUser as $order) {
        $dataProduct = responseData("Select price,link_image,name_product from products where id_product=" . $order['id_product'])[0];
        $product = array(
            'count' => $order['count_order'],
            'name' => $dataProduct['name_product'],
            'price' => $dataProduct['price']
        );
    }
    return $product;
}

function getTypeOrder($datetime)
{
    $id_user = $_SESSION['user_info']['id'];
    $typeOrder =
        responseData("SELECT type_order FROM orders
                  where order_date = '$datetime' and id_user = '$id_user'
                  group by type_order")[0]['type_order'];
    return configTypeOrder($typeOrder);
}

function configTypeOrder($type)
{
    if ($type === '1') {
        return "Đang xử lý";
    }
    return "Thành công";

}

function getOrderUser($date, $typeQuery)
{
    $id_user = $_SESSION['user_info']['id'];
    return responseData("Select $typeQuery from orders where id_user='$id_user' and order_date = '$date'
                                and type_order='1'");
}