<?php
include "../database/db_helper.php";

session_start();
$dataTechnology = responseData('SELECT * FROM technology');
$dataProducts = [];
$dataCategory = responseData('SELECT * FROM categories');
$id_technology = 1;
$dataProducts = responseData(
    'SELECT * FROM products');
//
//if (empty($dataProducts)) {
//    $dataProducts = responseData(
//        'SELECT * FROM products LEFT JOIN categories on products.id_category = categories.id_category');
//}
if (isset($_GET['id_technology'])) {
    $id_technology = $_GET['id_technology'];
    $dataProducts = responseData(
        'SELECT products.id_product,products.name_product,products.link_image,products.price,products.quantity FROM products
            LEFT JOIN configurations c on products.id_config = c.id_configurations
    Left Join main_product mp on c.id_main_product = mp.id_main_product
    Left join categories c2 on c2.id_category = mp.id_category
    Left Join technology t on t.id = c2.id_technology
            WHERE t.id =' . $id_technology);
}
//
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dataProducts = responseData(
        'SELECT products.id_product,products.name_product,products.link_image,products.price,products.quantity FROM products
            LEFT JOIN configurations c on products.id_config = c.id_configurations
            Left Join main_product mp on c.id_main_product = mp.id_main_product
            Left join categories c2 on c2.id_category = mp.id_category
            WHERE c2.id_category = ' . $id);
}
//
if (isset($_POST['decrement'])) {
    if (!isset($_GET['id'])) {
        $dataProducts = responseData('SELECT products.id_product,products.name_product,products.link_image,products.price,products.quantity FROM products ORDER BY price DESC');
    } else {
        $dataProducts = responseData('SELECT products.id_product,products.name_product,products.link_image,products.price,products.quantity FROM products
     LEFT JOIN configurations c on products.id_config = c.id_configurations
    Left Join main_product mp on c.id_main_product = mp.id_main_product
    Left join categories c2 on c2.id_category = mp.id_category
    WHERE c2.id_category = ' . $_GET['id'] . ' ORDER BY price DESC');
    }
}
//
if (isset($_POST['increment'])) {
    if (!isset($_GET['id'])) {
        $dataProducts = responseData('SELECT products.id_product,products.name_product,products.link_image,products.price,products.quantity FROM products ORDER BY price');
    } else {
        $dataProducts = responseData('SELECT products.id_product,products.name_product,products.link_image,products.price,products.quantity FROM products
     LEFT JOIN configurations c on products.id_config = c.id_configurations
    Left Join main_product mp on c.id_main_product = mp.id_main_product
    Left join categories c2 on c2.id_category = mp.id_category
         WHERE c2.id_category = ' . $_GET['id'] . ' ORDER BY price');
    }
}
