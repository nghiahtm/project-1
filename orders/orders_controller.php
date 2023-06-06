<?php
include_once "../database/db_helper.php";
session_start();
if(!isset($_SESSION['user_info'])){
    foreach ( $_SESSION['id_line'] as $item) {
        $dataCarts[]= responseData('Select * from products where id_product='.$item)[0];
        $newArray = array_count_values(array_column($dataCarts, 'id_product'));
        print_r($newArray);
    }
}