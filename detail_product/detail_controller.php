<?php
include "../database/db_helper.php";
session_start();

$id = $_GET['id'];
$responseProduct = responseData("Select * from products where id_product='$id'")[0];
$configInitData = $responseProduct['id_main_product'];
$responseSameCodeProducts = responseData("
Select c.chip, c.ram,c.vga,c.`size-memory`,p.id_product,p.price,p.quantity as count from configurations c
         left join products p on c.id_configurations = p.id_config
         where p.id_main_product='$configInitData'");

if (isset($_POST['product'])) {
    header('location: ../detail_product/detail_product.php?id=' . $_POST['id_product']);
}
