<?php
include_once "../database/db_helper.php";
session_start();

$id_user = $_SESSION['user_info']['id'];
$orderUser = responseData("Select id_product,count_order from orders where id_user='$id_user' 
                                and type_order='0'");
foreach ($orderUser as $order) {
    $dataCarts[] = array(
        'product' => responseData("Select * from products where id_product=" . $order['id_product'])[0],
        'count' => $order['count_order']
    );
}

if (isset($_POST['removeAll'])) {
    responseData("Delete from orders where id_user='$id_user'");
    header('location: order.php');
}

if (isset($_POST['delete-item'])) {
    responseData("DELETE FROM orders WHERE id_user='$id_user' and id_product=" . $_POST['id-product']);
    header('location: order.php');
}

function sumOrderProduct(){
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

