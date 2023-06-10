<?php
include_once "search_controller.php";
global $dataResult;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../register/register.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <title>Project1</title>
</head>
<body>
<div id="header">
    <?php
    include_once "../header/header.php";
    ?>
</div>
<div id="main">
    <div class="container d-flex align-items-center flex-column">
        <div class="d-flex my-2">
            <p class="title">Tìm kiếm</p>
        </div>
        <div class="my-3">
            <?php if (empty($dataResult)) { ?>
                <span>Không có sản phẩm cần tìm kiếm</span>
            <?php } else { ?>
                <span>Có <?php echo count($dataResult) ?> kết quả cho từ khoá "<?php echo $_GET['search'] ?>"</span>
            <?php } ?>
        </div>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 my-2">
            <?php
            foreach ($dataResult as $product) {
                ?>
                <a href="../detail_product/detail_product.php?id=<?php echo $product['id_product'] ?>"
                   class="d-flex flex-column production p-3 m-2">
                    <img class="img-fluid"
                         src="
                        <?php
                         echo $product['link_image']
                         ?>" alt="">
                    <p class="name-product"><?php echo $product['name_product'] ?></p>
                    <div class="d-flex flex-row mt-auto">
                        <p class="price <?php if ($product['quantity'] == 0) echo 'sold-out' ?>"> <?php
                            $money = number_format($product['price'], 0,
                                '', '.');
                            echo $money
                            ?> đ</p>
                        <?php if ($product['quantity'] == 0) { ?>
                            <p class="price mx-1">Hết hàng</p>
                        <?php } ?>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>