<?php
include "../database/db_helper.php";

$dataTechnology = responseData('SELECT * FROM technology');
$dataProducts = [];
$dataCategory = responseData('SELECT * FROM categories');
$id_technology = 1;
$dataProducts = responseData(
    'SELECT * FROM products LEFT JOIN categories on products.id_category = categories.id_category;');
if(empty($dataProducts)) {
    $dataProducts = responseData(
        'SELECT * FROM products LEFT JOIN categories on products.id_category = categories.id_category');
}

if (isset($_GET['id_technology'])) {
    $id_technology = $_GET['id_technology'];
    $dataProducts = responseData(
        'SELECT * FROM products 
            LEFT JOIN categories ON products.id_category = categories.id_category
            LEFT JOIN technology ON technology.id = categories.id_technology 
            WHERE technology.id =' .$id_technology);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dataProducts = responseData(
        'SELECT * FROM products 
            LEFT JOIN categories on products.id_category = categories.id_category
            WHERE products.id_category = '.$id);
}
