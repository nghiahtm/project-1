<?php
include "../header/count_order.php";
include "user_controller.php";
$id = $_SESSION['user_info']['id'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
</head>
<body>
<div id="header">
    <?php include "../header/header.php" ?>
</div>
<div class="container" id="main">
    <h4 class="text-danger my-1 mb-4">
        Thông tin người dùng
    </h4>
    <div>
        <h5>Thông tin mua hàng</h5>
        <div class="">Tổng số tiền đã mua: <span><?php $money = number_format(totalBillSuccess($id), 0,
                    '', '.');
                echo $money ?>đ</span></div>
        <div class="text-success">
        <span>
                    Đã hoàn thành: <?php echo getCount('2', $id) ?> sản phẩm
                </span>
        </div>
        <div class="text-warning"><span>
                    Đang xử lý:<?php echo getCount('1', $id) ?> sản phẩm
                </span></div>
        <div class="text-danger"><span>
                    Đã huỷ:<?php echo getCount('3', $id) ?> sản phẩm
                </span></div>
    </div>
    <div class="my-2"></div>
    <form method="post">
        <h5 class="m-0">Thông tin cá nhân</h5>
        <div class="form-group mb-1">
            <label for="name"></label>
            <input type="text" class="form-control border border-black" id="name"
                   name="name"
                   value="<?php echo $_SESSION['user_info']['user_name'] ?>"
                   placeholder="Họ và tên" />
        </div>
        <div class="form-group mb-1">
            <input type="text" class="form-control border border-black" id="name"
                   name="address"
                   value="<?php echo $_SESSION['user_info']['address'] ?>"
                   placeholder="Địa chỉ">
        </div>
        <div class="form-group mb-1">
            <input type="text" disabled="disabled" class="form-control"
                   aria-describedby="emailHelp" placeholder="Số điện thoại: <?php
            echo $_SESSION['user_info']['phone_number'] ?>">
        </div>
        <div class="form-group mb-3">
            <input type="text" disabled="disabled" class="form-control"
                   placeholder="Sinh nhật: <?php
                   $date = date_create($_SESSION['user_info']['birth']);
                   echo date_format($date, "d/m/Y");
                   ?>">
        </div>
        <button class="bg-danger border-0 text-white rounded-1" name="update_user">Cập nhật thông tin</button>
    </form>
</div>
</body>
</html>

