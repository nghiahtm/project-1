<?php
include "../database/db_helper.php";
session_start();

if (isset($_POST['phone']) && isset($_POST['password'])) {
    if (isSuccess())  {
        if (isset($_POST['login'])) {
            $postUserName = $_POST['phone'];
            $postPassword = $_POST['password'];
            $data = responseData("SELECT * FROM `users` where phone_number = '$postUserName' and `passwords` = '$postPassword'");
            if (empty($data)) {
                $_SESSION['phone'] = $_POST['phone'];
                header("location: login.php?error=3");
            } else {
                $_SESSION['user_info'] = $data[0];
                unset($_SESSION['error']);
                unset($_SESSION['phone']);
                header("Location: ../home/home.php");
                exit();
            }
        }
    }
}

function isSuccess()
{
    if (empty($_POST['phone']) && empty($_POST['password'])) {
        header("location: login.php?error=1");
        return false;
    } elseif (empty($_POST['password'])) {
        $_SESSION['phone'] = $_POST['phone'];
        header("location: login.php?error=4");
        return false;
    } elseif (empty($_POST['phone'])) {
        header("location: login.php?error=2");
        return false;
    }
    return true;
}
