<?php
session_start();
if(isset($_POST['orders'])){
    $_SESSION['orders'] = $_POST['orders'];
    echo $_SESSION['orders'];
   if($_SESSION['orders'] <= 5){
       $_SESSION['id_line'][] = $_POST['id_product'];
   }
}