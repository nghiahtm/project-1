<?php
include_once 'detail_controller.php';
global $responseProduct;
global $responseConfig;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
<div id="header">
    <?php include "../header/header.php" ?>
</div>
<div id="main">
    <div class="container px-0" id="category">
        <h3><?php echo $responseProduct['name_product'] ?></h3>
        <div class="row mt-1">
            <div class="col-5" id="features">
                <div class="d-flex bg-detail-product d-flex justify-content-center">
                    <img src="<?php echo $responseProduct['link_image'] ?>" alt="">
                </div>
            </div>
            <div class="col-7">
                <div class="flex-column">
                    <div class="d-flex flex-wrap">
                        <h4 class="price <?php if ($responseProduct['quantity'] == 0) echo 'sold-out' ?>">
                            <?php $money = number_format($responseProduct['price'], 0,
                                '', '.');
                            echo "$money đ" ?>
                        </h4>
                        <?php if ($responseProduct['quantity'] == 0) { ?>
                            <h4 class="price mx-1">Hết hàng</h4>
                        <?php } ?>
                    </div>
                    <div class="d-flex flex-wrap m-4">
                        <?php
                        global $responseSameCodeProducts;
                        foreach ($responseSameCodeProducts as $product) {
                            ?>
                            <form action="" method="Post">
                                <div class="mx-1"
                                     id="<?php if ($_GET['id'] == $product['id_product']) echo "button-chipped" ?>">
                                    <input type="text" value="<?php echo $product['id_product'] ?>" hidden="hidden"
                                           name="id_product">
                                    <button name="product" type="submit"
                                            class="rounded-3 bg-white <?php if ($_GET['id'] == $product['id_product']) echo "border-danger" ?>">
                                        Chip: <?php echo $product['chip'] ?>
                                        <br>Ram: <?php echo $product['ram'] ?>
                                        <br>Bộ nhớ trong: <?php echo $product['size-memory'] ?>
                                        <?php
                                        if (!empty($product['vga'])) {
                                            ?>
                                            <br>Card: <?php echo $product['vga'] ?>
                                        <?php } ?>
                                        <br> Giá: <?php if ($product['count'] != 0) {
                                            $money = number_format($product['price'], 0,
                                                '', '.');
                                            echo "$money đ";
                                        } else {
                                            echo "Hết hàng";
                                        } ?>
                                    </button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="d-flex bd-highlight">
                        <?php if ($responseProduct['quantity'] == 0) { ?>
                            <div class="text-danger flex-grow-1 d-flex align-items-center py-3 justify-content-center">
                                <h5>Hàng đã hết xin hãy đợi</h5>
                            </div>
                        <?php } elseif (empty($_SESSION['user_info']['id'])) { ?>
                            <a href="../login/login.php"
                               class="flex-grow-1 d-flex align-items-center py-3 justify-content-center bg-buy-now">
                                Đăng nhập để mua hàng
                            </a>
                        <?php } else {
                            ?>
                            <button id="buy-now"
                                    class="flex-grow-1 d-flex align-items-center py-3 justify-content-center bg-buy-now">
                                Mua Ngay
                            </button>
                            <button class="bg-buy-later" id="cart" name="count">
                                <input type="text" hidden="hidden" id="id-product"
                                       value="<?php echo $responseProduct['id_product'] ?>">
                                <img src="https://cdn2.cellphones.com.vn/50x,webp,q70/media/wysiwyg/add-to-cart.png"
                                     width="50" alt="cart-icon">
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-8">
                <div class="shadow p-2 bg-white rounded">
                    <div class="d-flex justify-content-center">
                        <h5>
                            Tính năng nổi bật
                        </h5>
                    </div>
                    <div class="flex-wrap" id="feature">
                        <?php echo $responseConfig['feature'] ?>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="shadow p-2 bg-white rounded">
                    <div class="column">
                        <div>
                            <h5>
                                Thông số kỹ thuật
                            </h5>
                        </div>
                        <div>
                            <table class="table table-striped table-borderless">
                                <tr>
                                    <td>Loại card đồ họa</td>
                                    <td><?php echo $responseConfig['vga'] ?></td>
                                </tr>
                                <tr>
                                    <td>Dung lượng RAM</td>
                                    <td><?php echo $responseConfig['ram'] ?></td>
                                </tr>
                                <tr>
                                    <td>Ổ cứng</td>
                                    <td><?php echo $responseConfig['size-memory'] ?></td>
                                </tr>
                                <tr>
                                    <td>Hệ điều hành</td>
                                    <td><?php echo $responseConfig['platform'] ?></td>
                                </tr>
                                <tr>
                                    <td>Độ phân giải màn hình</td>
                                    <td><?php echo $responseConfig['resolution'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="../header/get_count.js"></script>
<script src="../js/jquery.min.js"></script>

</html>