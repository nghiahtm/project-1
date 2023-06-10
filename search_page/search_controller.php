<?php
include_once "../database/db_helper.php";
session_start();
$search = $_GET['search'];
$dataResult = [];
if(!empty($_GET['search'])){
    $dataResult = responseData("Select * from products where name_product like'%$search%'");
}
