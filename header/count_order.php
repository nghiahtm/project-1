<?php
include_once "../database/db_helper.php";
session_start();
$id_user = $_SESSION['user_info']['id'];
$phone = $_SESSION['user_info']['id'];
$name = $_SESSION['user_info']['user_name'];
$id = $_POST['id_product'];
$date = date("Y-m-d H:i");

if (!empty($phone)) {
    $countOrder = responseData("Select count(*)as count from orders where id_user='$phone'")[0]['count'];
} else {
    $countOrder = 0;
}

if (!empty($_POST['orders'])) {
    $_SESSION['orders'] = $_POST['orders'];
    echo $_SESSION['orders'];
    if ($_SESSION['orders'] <= 5) {
        if (isUpdateOrCreateOrder($id, $id_user)) {
            $getCount = responseData("Select count_order from orders
                   WHERE id_user='$id_user'and id_product='$id'")[0]['count_order'];
            $getCount++;
            responseData("UPDATE orders
            SET count_order = $getCount
            WHERE id_user='$id_user'and id_product='$id'");
        } else {
            responseData("Insert into orders(id_user, name_user, id_product, type_order,count_order, create_order,order_date)
           values ('$phone','$name','$id','0','1','$date','$date')");
        }
        echo $_SESSION['orders'];
    }
}

function isUpdateOrCreateOrder($id, $user)
{
    $orders = responseData("Select id_product from orders where id_user='$user'");
    foreach ($orders as $order) {
        if ($id === $order['id_product']) {
            return true;
        }
    }
    return false;
}