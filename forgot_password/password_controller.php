<?php
include_once "../database/db_helper.php";
session_start();

$password = $_POST['password'];
$phone = $_POST['phone'];
$rePassword = $_POST['re-password'];

if (isset($_POST['update'])) {
    if (checkValidatePhoneNumber($phone)) {
        $_SESSION['phone-success'] = $phone;
       if (empty($password) || empty($rePassword)) {
            header('location: forgot_password.php?error=2');
        } elseif($password != $rePassword) {
            header('location: forgot_password.php?error=3');
        } else {
            responseData("update users set passwords ='$password' where phone_number='$phone'");
            header('location: ../login/login.php');
            unset($_SESSION['phone-success']);
        }
    } else {
        header('location: forgot_password.php?error=1');
    }
}

function checkValidatePhoneNumber($phone)
{
    if (!empty($phone)) {
        $id = responseData("select id from users where phone_number='$phone'")[0];
    }
    return !empty($id);
}