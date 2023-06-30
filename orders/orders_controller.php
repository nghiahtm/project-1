<?php
include_once "../database/db_helper.php";
session_start();

$id_user = $_SESSION['user_info']['id'];
$orderUser = responseData("Select id_product,count_order from orders where id_user='$id_user' 
                                and type_order='0'");
$id = $_POST['id-product'];
foreach ($orderUser as $order) {
    $dataCarts[] = array(
        'product' => responseData("Select * from products where id_product=" . $order['id_product'])[0],
        'count' => $order['count_order']
    );
}

if (isset($_POST['removeAll'])) {
    responseData("Delete from orders where id_user='$id_user'and type_order='0'");
    header('location: order.php');
}

if (isset($_POST['delete-item'])) {
    responseData("DELETE FROM orders WHERE id_user='$id_user'and type_order='0'and id_product=" . $_POST['id-product']);
    header('location: order.php');
}

if (isset($_POST['decrease'])) {
    $count = responseData("Select count_order from orders where id_user='$id_user' 
                                and type_order='0' and id_product=$id")[0]['count_order'];
    $total = --$count;
    if ($total === 0) {
        responseData("DELETE FROM orders WHERE id_user='$id_user'and type_order='0'and id_product=$id");
        $_SESSION['orders'] -= 1;
    } else {
        responseData("Update orders set 
                  count_order = '$total'
                  where id_user = '$id_user' and type_order ='0'
                    and id_product='$id'");
    }
    header('location: order.php');
}

if (isset($_POST['increase'])) {
    $count = responseData("Select count_order from orders where id_user='$id_user' 
                                and type_order='0' and id_product=$id")[0]['count_order'];
    $total = ++$count;
    responseData("Update orders set 
                  count_order = '$total'
                  where id_user = '$id_user' and type_order ='0'
                    and id_product='$id'");
    header('location: order.php');
}
function sumOrderProduct()
{
    $sum = 0;
    $id_user = $_SESSION['user_info']['id'];
    $orderUser = responseData("Select id_product,count_order from orders where id_user='$id_user' 
                                and type_order='0'");
    foreach ($orderUser as $order) {
        $price = responseData("Select price from products where id_product=" . $order['id_product'])[0]['price'];
        $sum += $order['count_order'] * $price;
    }
    return $sum;
}

if (isset($_POST['buy'])) {
    $dateTimeBuy = $date = date("Y-m-d H:i:s");
    foreach ($orderUser as $order) {
        $id_product = $order['id_product'];
        responseData("Update orders set 
                  type_order = '1',
                  order_date = '$dateTimeBuy'
                  where id_user = '$id_user'and type_order ='0'
                    and id_product='$id_product'");
        unset($_SESSION['orders']);
        header("location: ../history_order/history_order.php");
    }
}

