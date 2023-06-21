<?php
include_once "../database/db_helper.php";

$name = $_POST['full-name'];
$phone = $_POST['phone-number'];
$password = $_POST['password'];
$rePassword = $_POST['re-password'];
$birthday = $_POST['birthday'];
$errorRegister = '';

if (isset($_POST['register'])) {
    if (!isValidate()) {
        //echo $phone;
    } else {
        responseData("Insert into users(phone_number, passwords, user_name) values (
            '$phone','$password','$name')");
        unset($_SESSION['phone']);
        header('location: success.php');
    }
}
function isValidate()
{
    if (empty($_POST['phone-number'])) {
        header('location: register.php?error=1');
        return false;
    }else {
        $_SESSION['phone-register'] = $_POST['phone-number'];
    }
    if (empty($_POST['password'])) {
        header('location: register.php?error=2');
        return false;
    }
    if (strlen($_POST['password']) < 8) {
        header('location: register.php?error=5');
        return false;
    }
    if ($_POST['password'] != $_POST['re-password']) {
        header('location: register.php?error=4');
        return false;
    }
    if (!checkPhoneNumberIsExist($_POST['phone-number'])) {
        header('location: register.php?error=4');
        return false;
    }
    return true;

}

function showError($codeError)
{
    switch ($codeError) {
        case 1:
            return "Số điện thoại không được rỗng";
        case 2:
            return "Không để mật khẩu rỗng";
        case 4:
            return "Mật khẩu nhập lại không chính xác";
        case 5:
            return "Mật khẩu tối thiểu 8 ký tự";
        case 3:
            return "Số điện thoại đã tồn tại";
        default:
            return "";
    }
}

function checkPhoneNumberIsExist($phoneNumber)
{
    return empty(responseData("Select phone_number from users where phone_number='$phoneNumber'"));
}