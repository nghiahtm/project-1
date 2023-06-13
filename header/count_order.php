<?php
include_once "../database/db_helper.php";
session_start();
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
        responseData("Insert into orders(id_user, name_user, id_product, type_order, create_order,order_date) 
        values ('$phone','$name','$id','0','$date','$date')");
        $_SESSION['id_line'][] = $_POST['id_product'];
        $_SESSION['count'][$_POST['id_product']] += 1;
    }
}