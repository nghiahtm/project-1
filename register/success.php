<?php session_start();?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Project1</title>
</head>
<body>
<div id="header">
    <?php include "../header/header.php" ?>
</div>
    <div class="container" id="main">
        <h4>Đăng ký thành công</h4>
        <h4 class="d-flex justify-content-center">Bạn đã đăng ký thành công</h4>
        <div class="mb-3 d-flex justify-content-center">
            <a   href="../login/login.php" class="w-50 btn btn-lg bg-danger text-white rounded-5"
                 type="submit"
            >Đăng nhập
            </a>
        </div>
    </div>
</body>
</html>