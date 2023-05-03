<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../register/register.css">
    <link rel="stylesheet" href="../home/home.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <title>Project1</title>
</head>
<body>
<div id="header">
    <div class="container sticky-top">
        <div class="row py-2">
            <div class="col mx-0 ">
                <a href="../home/home.php" class="border-home d-flex justify-content-center align-items-center">
                    N
                </a>
            </div>
            <div class="col-6 mx-0">
                <div id="search-field" class="d-flex form-group">
                    <label for="search" class="form-group">
                        <svg height="15" width="15" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
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
<div id = "main">
    <div class="container d-flex align-items-center flex-column">
        <div class="d-flex my-5">
            <p class="title">Đăng nhập tài khoản</p>
        </div>
        <div class="mb-3 w-50">
            <div class="w-100 border-input" id="border-phone">
                <input class="input-group w-100" id="phone" type="text"
                       maxlength="10"
                       placeholder="Nhập số điện thoại"
                ">
            </div>
            <small class="text-error" id="phone-error"></small>
        </div>

        <div class="mb-3 w-50">
            <div class="w-100 border-input" id="border-password">
                <input class="input-group" id="password" name="password" type="password"
                       placeholder="Nhập mật khẩu">
                <span class="eyes" id="ic-password">
                    <svg id="eye-password" width="24" height="24" version="1.1" viewBox="0 0 20 20" x="0px" y="0px"
                         class="ScIconSVG-sc-1q25cff-1 dSicFr"><g><path d="M11.998 10a2 2 0 11-4 0 2 2 0 014 0z"></path><path
                                    fill-rule="evenodd"
                                    d="M16.175 7.567L18 10l-1.825 2.433a9.992 9.992 0 01-2.855 2.575l-.232.14a6 6 0 01-6.175 0 35.993 35.993 0 00-.233-.14 9.992 9.992 0 01-2.855-2.575L2 10l1.825-2.433A9.992 9.992 0 016.68 4.992l.233-.14a6 6 0 016.175 0l.232.14a9.992 9.992 0 012.855 2.575zm-1.6 3.666a7.99 7.99 0 01-2.28 2.058l-.24.144a4 4 0 01-4.11 0 38.552 38.552 0 00-.239-.144 7.994 7.994 0 01-2.28-2.058L4.5 10l.925-1.233a7.992 7.992 0 012.28-2.058 37.9 37.9 0 00.24-.144 4 4 0 014.11 0l.239.144a7.996 7.996 0 012.28 2.058L15.5 10l-.925 1.233z"
                                    clip-rule="evenodd"></path></g></svg>
                        <svg id="close-eye-password" hidden="true" width="24" height="24" version="1.1" viewBox="0 0 20 20" x="0px" y="0px"
                             class="ScIconSVG-sc-1q25cff-1 dSicFr"><g><path
                                        d="M16.5 18l1.5-1.5-2.876-2.876a9.99 9.99 0 001.051-1.191L18 10l-1.825-2.433a9.992 9.992 0 00-2.855-2.575 35.993 35.993 0 01-.232-.14 6 6 0 00-6.175 0 35.993 35.993 0 01-.35.211L3.5 2 2 3.5 16.5 18zm-2.79-5.79a8 8 0 00.865-.977L15.5 10l-.924-1.233a7.996 7.996 0 00-2.281-2.058 37.22 37.22 0 01-.24-.144 4 4 0 00-4.034-.044l1.53 1.53a2 2 0 012.397 2.397l1.762 1.762z"
                                        fill-rule="evenodd" clip-rule="evenodd"></path><path
                                        d="M11.35 15.85l-1.883-1.883a3.996 3.996 0 01-1.522-.532 38.552 38.552 0 00-.239-.144 7.994 7.994 0 01-2.28-2.058L4.5 10l.428-.571L3.5 8 2 10l1.825 2.433a9.992 9.992 0 002.855 2.575c.077.045.155.092.233.14a6 6 0 004.437.702z"></path></g></svg>
                </span>
            </div>
            <small class="text-error" id="password-error"></small>
        </div>
        <div class="mb-3 w-75 d-flex justify-content-center">
            <button class = "w-50 btn btn-lg btn-login " type="button">Đăng nhập</button>
        </div>
        <div class="create-acc">
            <span>
                Bạn chưa có tài khoản?
                <a href="../register/register.php" class="link">Đăng ký ngay</a>
            </span>
        </div>
    </div>
</div>
</body>
</html>