<?php
include_once "../database/db_helper.php";
session_start();
    if(count($_SESSION['id_line']) == 0){
        $dataCarts = [];
    }
   else {
       foreach ($_SESSION['id_line'] as $item) {
           $dataCarts[]= responseData('Select * from products where id_product='.$item)[0];
       }
   }


if(isset($_POST['removeAll'])){
    $_SESSION['id_line'] = [];
    $dataCarts = [];
    $_SESSION['orders'] = 0;
}