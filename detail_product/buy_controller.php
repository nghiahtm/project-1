<?php
session_start();
$user = $_POST['user'];
if (!empty($user)) {
    echo $_SESSION['orders'];
} else {
    echo "login";
}
