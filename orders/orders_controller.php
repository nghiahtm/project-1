<?php
include_once "../database/db_helper.php";
session_start();
if(!isset($_SESSION['user_info'])){
    if(count($_SESSION['id_line']) == 0){
        $dataCarts = [];
    }
   else {
       foreach ( $_SESSION['id_line'] as $item) {
           $dataCarts[]= responseData('Select * from products where id_product='.$item)[0];
           $newArray = array_count_values(array_column($dataCarts, 'id_product'));
       }
   }
}

if(isset($_POST['removeAll'])){
    $_SESSION['id_line'] = [];
    $dataCarts = [];
    $_SESSION['orders'] = 0;
}