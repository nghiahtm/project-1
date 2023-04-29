<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="../home/home.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <title>Project1</title>
</head>
<body>
<div id="header">
    <div class="container">
        <div class="row py-2 sticky-top">
            <div class="col mx-0 d-flex justify-content-center">
                <a href="../home/home.php" class="btn outline-custom hover">N</a>
            </div>
            <div class="col-5 mx-0">
                <div id="search-field" class="d-flex form-group">
                    <label for="search"></label>
                    <a href="">
                        <div class="p-2" onclick="">
                            <svg height="15" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
                        </div>
                    </a>
                    <input type="search" class="form-control flex-grow-1" id="search" placeholder="Tìm kiếm">
                </div>
            </div>
            <div class="col-6 mx-0 d-flex justify-content-end">
                <a href="" class="btn button-custom button-custom-color btn-sm d-flex justify-content-between mx-2 align-items-center" role="button">
                                   <span class="d-flex">
                                       <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.95 35.07" width="25" height="25"><defs><style>.cls-1 {
                                                       fill: none;
                                                       stroke: #fff;
                                                       stroke-linecap: round;
                                                       stroke-linejoin: round;
                                                       stroke-width: 1.8px;
                                                   }</style></defs> <g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M10,10.54V5.35A4.44,4.44,0,0,1,14.47.9h0a4.45,4.45,0,0,1,4.45,4.45v5.19" class="cls-1"></path> <path d="M23.47,34.17h-18A4.58,4.58,0,0,1,.91,29.24L2.5,8.78A1.44,1.44,0,0,1,3.94,7.46H25a1.43,1.43,0,0,1,1.43,1.32L28,29.24A4.57,4.57,0,0,1,23.47,34.17Z" class="cls-1"></path></g></g></svg>
                                       <span class="quality">
                                           0
                                       </span>
                                   </span>
                    <p class="my-0">Giỏ hàng</p>
                </a>
                <a href=""
                   rel="noopener noreferrer" target="_self" class="btn button-custom button-custom-color d-flex flex-column btn-sm justify-content-center align-items-center">
                    <img src="../images/user.png" alt="" >
                    <p class="my-0">Member</p>
                </a>
            </div>
        </div>
    </div>
</div>
<div id = "main">
    <form action="" method="post">
        <div class="container d-flex align-items-center flex-column">
            <div class="d-flex my-5">
                <p class="title">Đăng ký tài khoản</p>
            </div>
            <div class="mb-3 w-50">
                <input class="input-group input-group-lg" id="phone" name="email" type="text" required minlength="2"
                       maxlength="10"
                       placeholder="Vui lòng Nhập số điện thoại"
                       pattern="[1-9]{1}[0-9]{9}">
            </div>
            <div class="mb-3 w-50">
                <input class="input-group input-group-lg" id="name" name="name" type="text" placeholder="Tên tài khoản">
            </div>
            <div class="mb-3 w-50">
                <input class="input-group input-group-lg" id="password" name="password" type="password" required="required" placeholder="Nhập mật khẩu">
            </div>
            <div class="mb-3 w-50">
                <input class="input-group input-group-lg" id="re-password" name="password" type="password" required="required" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="mb-3 w-75 d-flex justify-content-center">
                <button class = "w-50 btn btn-lg btn-login" type="button" name="register">Đăng ký</button>
            </div>
            <div class="create-acc">
            <span>
                Bạn đã có tài khoản?
                <a href="../login/login.php" class="link">Đăng nhập</a>
            </span>
            </div>
        </div>
    </form>
    <?php

    ?>
</div>
</body>
</html>