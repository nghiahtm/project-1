<?php
include_once "../database/db_helper.php";
session_start();
$id_user = $_SESSION['user_info']['id'];
$phone = $_SESSION['user_info']['id'];
$name = $_SESSION['user_info']['user_name'];
$id = $_POST['id_product'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("Y-m-d H:i:s");

$countOrder = 0;
if (!empty($phone)) {
    $countOrders = responseData("Select count_order from orders where id_user='$phone' and type_order='0'");
    foreach ($countOrders as $count) {
        $countOrder += $count['count_order'];
    }
}

if (!empty($_POST['orders'])) {
    $_SESSION['orders'] = $_POST['orders'];
    echo $_SESSION['orders'];
    if ($_SESSION['orders'] <= 3) {
        if (isUpdateOrCreateOrder($id, $id_user)) {
            $getCount = responseData("Select count_order from orders
                   WHERE id_user='$id_user'and id_product='$id' and type_order='0'")[0]['count_order'];
            $getCount++;
            responseData("UPDATE orders
            SET count_order = $getCount
            WHERE id_user='$id_user'and id_product='$id'");
        } else {
            responseData("Insert into orders(id_user, name_user, id_product, type_order,count_order, create_order,order_date)
           values ('$phone','$name','$id','0','1','$date','$date')");
        }
    }
}

function isUpdateOrCreateOrder($id, $user)
{
    $orders = responseData("Select id_product from orders where id_user='$user'and type_order='0'");
    if (empty($orders)) {
        return false;
    }
    foreach ($orders as $order) {
        if ($id === $order['id_product']) {
            return true;
        }
    }
    return false;
}