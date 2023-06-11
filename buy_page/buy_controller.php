<?php
session_start();
$user = $_POST['user'];
if (!empty($user)) {
    echo "success";
} else {
    echo "login";
}
