<?php
include_once "../database/db_helper.php";
session_start();

function getCount($typeOrder, $user)
{
    $total = 0;
    $countOrders = responseData("Select count_order as count from orders 
                         where type_order ='$typeOrder'and id_user=$user");
    foreach ($countOrders as $countOrder) {
        $total += $countOrder['count'];
    }
    return $total;
}

function totalBillSuccess($user)
{
    $total = 0;
    $countOrders = responseData("Select id_product,count_order as count from orders 
                         where type_order ='2'and id_user=$user");
    foreach ($countOrders as $orderSuccess) {
        $price = responseData("Select price from products where id_product=".
            $orderSuccess['id_product'])[0]['price'];
        $total += $orderSuccess['count'] * $price;
    }
    return $total;
}

if (isset($_POST['update_user'])) {
    $name = $_POST['name'];
    $id = $_SESSION['user_info']['id'];
    if (!empty($name)) {
        responseData("Update users set user_name='$name' where id = '$id'");
        $_SESSION['user_info']['user_name'] = $name;
    }
}