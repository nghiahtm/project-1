<?php
include_once "../database/db_helper.php";
session_start();

$id_user = $_SESSION['user_info']['id'];
$orderUser = responseData("Select id_product,count_order from orders where id_user='$id_user' 
                         and type_order='0'");
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_SESSION['user_info']['phone_number'];
if (isset($_POST['set_orders'])) {
    $dateTimeBuy = date("Y-m-d H:i:s");
    if (empty($name) || empty($address) || empty($phone)) {
        header("location: payment.php?error=1");
    } else {
        $uniq = uniqid('NS');
        foreach ($orderUser as $order) {
            $id_product = $order['id_product'];
            responseData("Update orders set 
                  type_order = '1',
                  order_date = '$dateTimeBuy',
                  create_order ='$dateTimeBuy',
                  name_user = '$name',
                  code_orders = '$uniq',
                  address = '$address',
                  phone_number = '$phone'
                  where id_user = '$id_user'and type_order ='0'
                    and id_product='$id_product'");
            unset($_SESSION['orders']);
        }
        header("location: ../history_order/history_order.php");
    }
}



