<?php
include "history_controller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
    <script src="../js/jquery.min.js"></script>
</head>
<body>

<div id="header">
    <?php
    include_once "../header/header.php";
    ?>
</div>
<div class="container" id="main">
    <h4 class="text-danger my-1">
        Lịch sử mua hàng
    </h4>
    <table class="table table-striped table-bordered table-sm my-2 text-center">
        <thead>
        <tr>
            <th scope="col">Ngày mua</th>
            <th scope="col">Phương thức thanh toán</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Mặt hàng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái mua hàng</th>
        </tr>
        </thead>
        <tbody>
        <?php
        global $dataHistory;
        $bills = billsUser($dataHistory);
        foreach (array_keys($bills) as $ordersDate) { ?>
            <tr>
                <td><?php
                    $date = date_create($ordersDate);
                    echo date_format($date, 'd/m/y H:i');
                    ?> </td>
                <td>Tiền mặt</td>
                <td><?php echo totalCount($ordersDate)?></td>
                <td>
                    <?php
                    $dataProducts = getProducts($ordersDate);
                    foreach ($dataProducts as $item) {
                        echo $item;
                    }?>
                </td>
                <td>
                    <?php $money = number_format(totalBill($ordersDate), 0,
                        '', '.');
                    echo $money ?>đ
                </td>
                <td class="<?php echo getTypeOrder($ordersDate) === "Đang xử lý" ? "text-warning" : "text-success" ?>">
                    <?php echo getTypeOrder($ordersDate) ?>
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
</div>
</body>
<script src="../header/get_count.js"></script>
</html>

