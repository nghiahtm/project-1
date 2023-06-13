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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery.min.js"></script>
</head>
<body>
<div id="header">
<!--    --><?php //include "../header/header.php" ?>
</div>
<div class="container" id="main">
    <h4 class="text-danger">
        Giỏ hàng
    </h4>
    <div>
        <?php if (empty($dataCarts)) { ?>
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
                                <input type="text" hidden="hidden" name="id-product" value="<?php echo $product['id_product']?>">
                                <button class="bg-danger text-white border-white" type="submit" name="delete-item"><i
                                            class="bi bi-trash3"></i></button>
                            </form>
                        </h5>
                        <h5 class="text-danger"> <?php $money = number_format($product['price']
                                * $dataCart['count'], 0,
                                '', '.');
                            echo $money ?>đ</h5>
                        <div>
                            <button class="btn btn-outline-danger">-</button>
                            <span><?php echo $dataCart['count'] ?></span>
                            <button class="btn btn-outline-danger">+</button>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>
</body>
<script src="../header/get_count.js"></script>
</html>

