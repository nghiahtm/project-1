<?php
include_once "count_order.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project1</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../home/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
<div class="container sticky-top">
    <div class="row py-2" id>
        <div class="col mx-0 ">
            <a href="../home/home.php" class="border-home d-flex justify-content-center align-items-center">
                N
            </a>
        </div>
        <div class="col-6 mx-0">
            <form action="../header/search_location.php" method="post" class="d-flex bd-highlight">
                <div id="search-field" class="flex-fill bd-highlight">
                    <label for="search" class="form-group">
                        <svg height="15" width="15" aria-hidden="true" focusable="false" data-prefix="fas"
                             data-icon="search"
                             role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                             class="svg-inline--fa fa-search">
                            <path fill="currentColor"
                                  d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                        <input type="search" class="form-control" name="search"
                               placeholder="Tìm kiếm">
                    </label>
                </div>
                <input type="submit" value="Tìm kiếm"
                       class="btn bg-danger text-white btn-outline-light">
            </form>
        </div>
        <div class="col-5 mx-0 d-flex justify-content-end">
            <a href="../orders/order.php"
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
                                       <span class="quantity" id="quantity">
                                           <?php
                                           global $countOrder;
                                           echo $countOrder ?>
                                       </span>
                                   </span>
                <p class="my-0">Giỏ hàng</p>
            </a>
            <?php
            $name = $_SESSION['user_info'];
            if (empty($name)) {
                ?>
                <a href="../login/login.php"
                   rel="noopener noreferrer" target="_self"
                   class="btn button-custom button-custom-color d-flex flex-column btn-sm justify-content-center align-items-center">
                    <img src="../images/user.png" alt="">
                    <p class="my-0">Đăng nhập</p>
                </a>
                <?php
            } else {
                ?>
                <button type="button"
                        class="my-0 btn button-custom button-custom-color d-flex flex-column btn-sm justify-content-center align-items-center"
                        data-bs-toggle="dropdown">
                    <img src="../images/user.png" alt="">
                    <span id="name-user">
                            <?php
                            session_start();
                            echo $_SESSION['user_info']['user_name'];
                            ?>
                      </span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../information_user/user.php">Thông tin người dùng</a></li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li><a class="dropdown-item" href="../history_order/history_order.php">Lịch sử đơn hàng</a></li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li><a class="dropdown-item" href="../header/logout.php">Đăng xuất</a></li>
                </ul>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>
</html>
