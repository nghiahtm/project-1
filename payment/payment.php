<?php
include "../header/count_order.php";
include "payment_controller.php";
include "../orders/orders_controller.php";
global $dataCarts;
$error = $_GET['error']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
</head>
<style>
    input[type='radio'] {
        accent-color: rgb(250, 53, 69);
    }
</style>
<body>
<div id="header">
    <?php include "../header/header.php" ?>
</div>
<div class="container" id="main">
    <form method="post">
        <?php if($error == 1){?>
            <h5 class="bg-danger text-white p-1">Hãy điền đầy đủ thông tin</h5>
        <?php }?>
        <h5 class="m-0">Thông tin đặt hàng</h5>
        <div class="form-group mb-1">
            <label for="name">Họ và tên</label>
            <input type="text" class="form-control border border-black" id="name"
                   name="name"
                   value="<?php echo $_SESSION['user_info']['user_name'] ?>"
                   placeholder="Họ và tên"/>
        </div>
        <div class="form-group mb-1">
            <label for="address">Địa chỉ</label>
            <input type="text" class="form-control border border-black" id="address"
                   name="address"
                   value="<?php echo $_SESSION['user_info']['address'] ?>"
                   placeholder="Địa chỉ">
        </div>
        <div class="form-group mb-1">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control border border-black" id="address"
                   name="phone" maxlength="10" minlength="10"
                   value="<?php echo $_SESSION['user_info']['phone_number'] ?>"
                   placeholder="Nhập số điện thoại">
        </div>
        <h5 class="mt-2">Danh sách mặt hàng</h5>
        <?php foreach ($dataCarts as $dataCart) {
            $product = $dataCart['product'];
            ?>
            <div class="d-flex flex-row">
                <img src="<?php echo $product['link_image'] ?>" alt="" width="120" height="120">
                <div class="d-flex flex-column mx-2">
                    <h5> <?php echo $product['name_product'] ?>
                    </h5>
                    <h5 class="text-danger"> <?php $money = number_format($product['price']
                            * $dataCart['count'], 0,
                            '', '.');
                        echo $money ?>đ</h5>
                    <span>
                        Số lượng: <?php
                        echo $dataCart['count'] ?></span>
                </div>
            </div>
        <?php } ?>

        <div class="py-3 d-flex flex-column align-items-center">
            <h4 class="text-danger">Tổng giá trị sản phẩm:
                <?php
                $money = number_format(sumOrderProduct(), 0,
                    '', '.');
                echo $money ?>đ</h4>
            <h5 class="d-flex flex-row align-items-center">Phương thức thanh toán:
                    <div class="d-flex flex-row align-items-center">
                        <input type="radio" id="money" name="fav_language" value="1" checked="checked" >
                        <label for="money" class="text-danger">Tiền mặt</label>
                    </div>
            </h5>

            <button class="bg-danger border-0 text-white rounded-1 mt-3 w-50 py-2" name="set_orders">Đặt hàng</button>
        </div>
    </form>
</div>
</body>
<script src="../header/get_count.js"></script>
</html>

