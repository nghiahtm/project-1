<?php
include "controller_home.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="home.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>
<body>
    <div id="header">
        <div class="container">
            <div class="row py-2">
                <div class="col mx-0 navbar-brand">
                    <a href="../home/home.php" class="border-home d-flex justify-content-center align-items-center">
                        N
                    </a>
                </div>
                <div class="col-6 mx-0">
                    <div id="search-field" class="d-flex form-group">
                        <label for="search" class="form-group">
                            <svg height="15" width="15" aria-hidden="true" focusable="false" data-prefix="fas"
                                 data-icon="search"
                                 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                 class="svg-inline--fa fa-search">
                                <path fill="currentColor"
                                      d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </label>
                        <input type="search" class="form-control flex-grow-1" id="search" placeholder="Tìm kiếm">
                    </div>
                </div>
                <div class="col-5 mx-0 d-flex justify-content-end">
                    <a href=""
                       class="btn button-custom button-custom-color btn-sm d-flex justify-content-between mx-2 align-items-center"
                       role="button">
                                   <span class="d-flex">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.95 35.07" width="25"
                                            height="25"><defs><style>.cls-1 {
                                                       fill: none;
                                                       stroke: #fff;
                                                       stroke-linecap: round;
                                                       stroke-linejoin: round;
                                                       stroke-width: 1.8px;
                                                   }</style></defs> <g id="Layer_2" data-name="Layer 2"><g
                                                       id="Layer_1-2" data-name="Layer 1"><path
                                                           d="M10,10.54V5.35A4.44,4.44,0,0,1,14.47.9h0a4.45,4.45,0,0,1,4.45,4.45v5.19"
                                                           class="cls-1"></path> <path
                                                           d="M23.47,34.17h-18A4.58,4.58,0,0,1,.91,29.24L2.5,8.78A1.44,1.44,0,0,1,3.94,7.46H25a1.43,1.43,0,0,1,1.43,1.32L28,29.24A4.57,4.57,0,0,1,23.47,34.17Z"
                                                           class="cls-1"></path></g></g></svg>
                                       <span class="quality">
                                           0
                                       </span>
                                   </span>
                        <p class="my-0">Giỏ hàng</p>
                    </a>
                    <a href="../login/login.php"
                       rel="noopener noreferrer" target="_self"
                       class="btn button-custom button-custom-color d-flex flex-column btn-sm justify-content-center align-items-center">
                        <img src="../images/user.png" alt="">
                        <p class="my-0">Đăng nhập</p>
                    </a>
                </div>
            </div>
        </div>
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
                <a href="../detail_product/detail_product.php" class="d-flex flex-column production p-3 m-2">
                    <img class="img-fluid"
                         src="
                        <?php
                         echo $product['link_image']
                         ?>" alt="">
                    <p class="name-product"><?php
                        echo $product['name_product']
                        ?></p>
                    <p class="price mt-auto"> <?php
                        $money = number_format($product['price_product'], 0,
                            '', '.');;
                        echo $money
                        ?> đ</p>
                </a>
                <?php
            }
            ?>
        </div>
        <div id="footer"></div>
        <script src="../home/home.js"></script>
</body>
</html>

