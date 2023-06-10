<?php
$_SESSION['search'] = $_POST['search'];
if(!empty($_POST['search'])){
    header("location: ../search_page/search_page.php?search=".$_POST['search']);
}else {
    header("location: ../search_page/search_page.php");
}