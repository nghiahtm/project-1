<?php
include_once "../database/db_helper.php";
session_start();

$id = $_POST['create'];
$id_user = $_SESSION['user_info']['id'];

$getOrders = responseData("Select * from orders where code_orders='$id'and id_user='$id_user'");