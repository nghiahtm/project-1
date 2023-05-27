<?php
include "../database/db_helper.php";
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (!isSuccess()) {
        header("location: login.php");
    } else{
        if(isset($_POST['login'])){
            $postUserName = $_POST['username'];
            $postPassword = $_POST['password'];
            $data = responseData("SELECT * FROM `users` where phone_number = '$postUserName' and `passwords` = '$postPassword'");
            if (empty($data)) {
                $_SESSION['error'] = 'Sai tài khoản hoặc mật khẩu';
                header("location: login.php");
            } else {
                $_SESSION['username'] = $data[0]['username'];
                unset($_SESSION['error']);
                unset($_SESSION['phone']);
                header("Location: ../home/home.php");
                exit();
            }
        }
    }
}

function isSuccess () {
    if (empty($_POST['username']) && empty($_POST['password'])) {
        $_SESSION['error'] = 'Nhập tài khoản và mật khẩu';
        return false;
    } elseif (empty($_POST['password'])) {
        $_SESSION['phone'] = $_POST['username'];
        $_SESSION['error'] = 'Nhập mật khẩu';
        return false;
    } elseif (empty($_POST['username'])) {
        $_SESSION['error'] = 'Nhập tài khoản';
        return false;
    }
    return true;
}
