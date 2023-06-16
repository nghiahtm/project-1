<?php
include "controller_home.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
    <link rel="stylesheet" href="home.css">
    <script src="../js/jquery.min.js"></script>
</head>
<body>
    <div id="header">
        <?php
            include_once "../header/header.php";
        ?>
    </div>
<div id="main">
    <div class="container px-0 d-flex align-self-center flex-wrap background-tag my-1" id="category">
        <?php
        global $dataTechnology;
        foreach ($dataTechnology as $technology) {
            ?>
            <a href='<?php
            echo '?id_technology=' . $technology['id']
            ?>' id=' <?php
            echo $technology['id']
            ?>' class="<?php
            global $id_technology;
            echo $id_technology == $technology['id'] ? "button-selected" : "button-unselected"
            ?>">
                <div id="laptop">
                    <p> <?php
                        echo $technology['name_technology']
                        ?></p>
                </div>
            </a>
            <?php
        }
        ?>
    </div>
    <div class="container px-0 d-flex flex-wrap align-content-start mt-2">
        <?php
        global $dataCategory;
        foreach ($dataCategory as $category) {
            ?>
            <a href="<?php
            echo '?id=' . $category['id_category']
            ?>" class="btn btn-outline-danger m-2">
                <img class="px-3 py-3"
                     src=" <?php
                     echo $category['image']
                     ?>"
                     height="50" alt="">
            </a>
            <?php
        }
        ?>
    </div>
    <div class="container px-0">
        <h4>Sắp xếp theo</h4>
        <div class="flex-wrap flex-row align-items-center">
            <form action="" method="post">
                <button name="decrement" class="d-inline-flex flex-row align-items-center p-1 filter">
                    <svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M416 288h-95.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H416c17.67 0 32-14.33 32-32S433.7 288 416 288zM544 32h-223.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H544c17.67 0 32-14.33 32-32S561.7 32 544 32zM352 416h-32c-17.67 0-32 14.33-32 32s14.33 32 32 32h32c17.67 0 31.1-14.33 31.1-32S369.7 416 352 416zM480 160h-159.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H480c17.67 0 32-14.33 32-32S497.7 160 480 160zM192.4 330.7L160 366.1V64.03C160 46.33 145.7 32 128 32S96 46.33 96 64.03v302L63.6 330.7c-6.312-6.883-14.94-10.38-23.61-10.38c-7.719 0-15.47 2.781-21.61 8.414c-13.03 11.95-13.9 32.22-1.969 45.27l87.1 96.09c12.12 13.26 35.06 13.26 47.19 0l87.1-96.09c11.94-13.05 11.06-33.31-1.969-45.27C224.6 316.8 204.4 317.7 192.4 330.7z"></path>
                    </svg>
                    <span class="type-filter">Giá cao-thấp</span>
                </button>
                <button name="increment" class="d-inline-flex flex-row align-items-center p-1 filter">
                    <svg height="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M416 288h-95.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H416c17.67 0 32-14.33 32-32S433.7 288 416 288zM544 32h-223.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H544c17.67 0 32-14.33 32-32S561.7 32 544 32zM352 416h-32c-17.67 0-32 14.33-32 32s14.33 32 32 32h32c17.67 0 31.1-14.33 31.1-32S369.7 416 352 416zM480 160h-159.1c-17.67 0-32 14.33-32 32s14.33 32 32 32H480c17.67 0 32-14.33 32-32S497.7 160 480 160zM192.4 330.7L160 366.1V64.03C160 46.33 145.7 32 128 32S96 46.33 96 64.03v302L63.6 330.7c-6.312-6.883-14.94-10.38-23.61-10.38c-7.719 0-15.47 2.781-21.61 8.414c-13.03 11.95-13.9 32.22-1.969 45.27l87.1 96.09c12.12 13.26 35.06 13.26 47.19 0l87.1-96.09c11.94-13.05 11.06-33.31-1.969-45.27C224.6 316.8 204.4 317.7 192.4 330.7z"></path>
                    </svg>
                    <span class="type-filter">Giá thấp-cao</span>
                </button>
            </form>
        </div>
    </div>
    <div class="container px-0 mt-4">
        <?php
        global $dataProducts;
        if (empty($dataProducts)) {
            ?>
            <div class="d-flex justify-content-center">
                <p style="color: black">
                    <?php
                    echo 'Chưa có sản phẩm'
                    ?>
                </p>
            </div>
            <?php
        }
        ?>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <?php
            foreach ($dataProducts as $product) {
                ?>
                <a href="../detail_product/detail_product.php?id=<?php echo $product['id_product']?>" class="d-flex flex-column production p-3 m-2">
                    <img class="img-fluid"
                         src="
                        <?php
                         echo $product['link_image']
                         ?>" alt="">
                    <p class="name-product"><?php echo $product['name_product'] ?></p>
                    <div class="d-flex flex-row mt-auto">
                        <p class="price <?php if($product['quantity'] == 0) echo 'sold-out'?>"> <?php
                            $money = number_format($product['price'], 0,
                                '', '.');
                            echo $money
                            ?> đ</p>
                        <?php if($product['quantity'] == 0) {?>
                            <p class="price mx-1">Hết hàng</p>
                        <?php } ?>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
        <div id="footer"></div>
        <script src="../home/home.js"></script>
</body>
</html>
