<?php
include "../header/count_order.php";
include "orders_controller.php";
global $dataCarts;
global $countProduct;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
</head>
<style>
    input[type='radio'] {
        accent-color: rgb(250,53,69);
    }
</style>
<body>
<div id="header">
    <?php include "../header/header.php" ?>
</div>
<div class="container" id="main">
    <h4 class="text-danger">
        Giỏ hàng
    </h4>
    <div>
        <?php if (empty($_SESSION['user_info'])) { ?>
            <a href="../login/login.php"
               class="bg-danger p-2 rounded-2">Đăng nhập để vào giỏ hàng</a>
        <?php } elseif (empty($dataCarts)) { ?>
            <h5>Chưa có sản phẩm trong giỏ hàng</h5>
        <?php } else { ?>
            <form action="" method="post">
                <button type="submit" name="removeAll" class="btn btn-danger text-white">Xoá tất cả</button>
            </form>
            <?php foreach ($dataCarts as $dataCart) {
                $product = $dataCart['product'];
                ?>
                <div class="d-flex flex-row">
                    <img src="<?php echo $product['link_image'] ?>" alt="" width="120" height="120">
                    <div class="d-flex flex-column mx-2">
                        <h5> <?php echo $product['name_product'] ?>
                            <form action="" method="post">
                                <input type="text" hidden="hidden" name="id-product"
                                       value="<?php echo $product['id_product'] ?>">
                                <button class="bg-danger text-white border-white" type="submit" name="delete-item"><i
                                            class="bi bi-trash3"></i></button>
                            </form>
                        </h5>
                        <h5 class="text-danger"> <?php $money = number_format($product['price']
                                * $dataCart['count'], 0,
                                '', '.');
                            echo $money ?>đ</h5>
                        <div>
                            <form action="" method="post">
                                <button class="btn btn-outline-danger" name="increase" type="submit">
                                    <input type="text" hidden="hidden" name="id-product"
                                           value="<?php echo $product['id_product'] ?>">
                                    -
                                </button>
                                <span><?php
                                    echo $dataCart['count'] ?></span>
                                <button class="btn btn-outline-danger" name="decrease">
                                    <input type="text" hidden="hidden" name="id-product"
                                           value="<?php echo $product['id_product'] ?>">
                                    +
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="py-3 d-flex flex-column align-items-center">
                    <h4 class="text-danger">Tổng giá trị sản phẩm:
                        <?php
                        $money = number_format(sumOrderProduct(), 0,
                            '', '.');
                        echo $money?>đ</h4>
                    <br>
                <h5 class="d-flex flex-row align-items-center">Phương thức thanh toán: <form action="" class="d-flex flex-sm-row">
                        <div class="d-flex flex-row align-items-center">
                            <input type="radio" id="money" name="fav_language" value="1" checked="checked" >
                            <label for="money" class="text-danger">Tiền mặt</label>
                        </div>
<!--                        <div class="px-1"></div>-->
<!--                        <div class="d-flex flex-row align-items-center">-->
<!--                            <input type="radio" id="banking" name="fav_language" value="2">-->
<!--                            <label for="banking" class="text-danger">Banking</label>-->
<!--                        </div>-->
                    </form></h5>
                <br>
                <form action="" method="post">
                    <button class="bg-danger p-2 rounded-2 text-white border-0" name="buy" type="submit">Mua sản phẩm</button>
                </form>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
<script src="../header/get_count.js"></script>
</html>

