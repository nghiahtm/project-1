<?php
include_once 'cancel_controller.php';
global $getOrders;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div id="header">
    <?php
    include_once "../header/header.php";
    ?>
</div>
<div class="container" id="main">
    <h4 class="text-danger my-1">
        Lý do huỷ đơn hàng
    </h4>
    <div>
        <textarea name="description" id="" cols="60" rows="5" placeholder="Lý do huỷ đơn hàng"></textarea>
    </div>
    <div>
        <button name="remove" class="btn btn-danger text-white">
            Huỷ đơn hàng
        </button>
    </div>
</div>
</body>
</html>

