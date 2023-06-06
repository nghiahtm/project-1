<?php
include "controller_login.php";
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
<div id = "main">
    <div class="container d-flex align-items-center flex-column">
        <div class="d-flex my-2">
            <p class="title">Đăng nhập tài khoản</p>
        </div>
        <?php
        $error = $_SESSION['error'];
        if(!empty($_SESSION['error'])){
            ?>
            <div class="bg-danger text-white my-2 rounded-1 p-1 text-center"><?php echo $error?></div>
        <?php }?>
        <form action="controller_login.php" method="post" class="w-50">
            <div class="mb-3">
                <div class="w-100 border-input" id="border-phone">
                    <input class="input-group w-100" id="phone" type="text"
                           maxlength="10"
                           placeholder="Nhập số điện thoại"
                           name="username"
                           value="<?php echo $_SESSION['phone']?>"
                    ">
                </div>
            </div>

            <div class="mb-3">
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
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <button class = "w-50 btn btn-lg bg-danger text-white rounded-5" type="submit" name="login">Đăng nhập</button>
            </div>
        </form>
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