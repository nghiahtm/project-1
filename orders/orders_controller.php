<?php
include_once "../database/db_helper.php";
session_start();

$id_user = $_SESSION['user_info']['id'];
$orderUser = responseData("Select id_product,count(id_cart)as count from orders where id_user='$id_user' group by id_product");
foreach ($orderUser as $order) {
    $dataCarts[] = array(
        'product'=>responseData("Select * from products where id_product=" . $order['id_product'])[0],
        'count'=>$order['count']
    );
}

if (isset($_POST['removeAll'])) {
    $_SESSION['id_line'] = [];
    $countProduct = [];
    $_SESSION['orders'] = 0;
    unset($_SESSION['count']);
}

if (isset($_POST['delete-item'])) {
    responseData("DELETE FROM orders WHERE id_user='$id_user' and id_product=" . $_POST['id-product']);
}