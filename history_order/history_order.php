<?php
include_once "history_controller.php";
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
        Lịch sử mua hàng
    </h4>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item <?php if (empty($_GET['order'])) echo 'bg-danger'; ?>">
            <a href="history_order.php" class="<?php echo empty($_GET['order']) ? 'text-white' : 'text-black'; ?>">Tất
                cả</a></li>
        <li class="list-group-item <?php if ($_GET['order'] == '2') echo 'bg-danger'; ?>">
            <a href="?order=2" class="<?php echo $_GET['order'] == '2' ? 'text-white' : 'text-black'; ?>">
                Thành công</a></li>
        <li class="list-group-item <?php if ($_GET['order'] == '1') echo 'bg-danger'; ?>">
            <a href="?order=1"
               class="<?php echo $_GET['order'] == '1' ? 'text-white' : 'text-black'; ?>">Đang
                xử lý</a></li>
        <li class="list-group-item <?php if ($_GET['order'] == '4') echo 'bg-danger'; ?>">
            <a href="?order=4"
               class="<?php echo $_GET['order'] == '4' ? 'text-white' : 'text-black'; ?>">Đang
                chờ huỷ</a></li>
        <li class="list-group-item <?php if ($_GET['order'] == '3') echo 'bg-danger'; ?>">
            <a href="?order=3"
               class="<?php echo $_GET['order'] == '3' ? 'text-white' : 'text-black'; ?>">Đã
                huỷ</a></li>
    </ul>
    <?php global $dataHistory;
    if (!empty($dataHistory)) { ?>
        <div>
            <table class="table table-striped table-bordered table-sm my-2 text-center">
                <thead>
                <tr>
                    <th class="align-middle" scope="col" rowspan="2">Ngày mua</th>
                    <th class="align-middle" scope="col" rowspan="2">Phương thức thanh toán</th>
                    <th class="align-middle" scope="col" rowspan="2">Số lượng</th>
                    <th class="align-middle" scope="col" colspan="3">Mặt hàng</th>
                    <th class="align-middle" scope="col" rowspan="2">Tổng tiền</th>
                    <th class="align-middle" scope="col" rowspan="2">Trạng thái mua hàng</th>
                    <th class="align-middle" scope="col" rowspan="2">Huỷ đơn hàng</th>
                </tr>
                <tr>
                    <th class="align-middle">Tên sản phẩm</th>
                    <th class="align-middle">Giá một sản phẩm</th>
                    <th class="align-middle">Số lượng</th>
                </tr>
                </thead>
                <tbody>
                <?php
                global $dataHistory;
                $bills = billsUser($dataHistory);
                foreach (array_keys($bills) as $ordersDate) {
                    $dataProducts = getProducts($ordersDate);
                    $rowspanProducts = count($dataProducts['products']);
                    ?>
                    <tr>
                        <td class='align-middle' rowspan="<?php echo $rowspanProducts ?>"><?php
                            $date = date_create($ordersDate);
                            echo date_format($date, 'd/m/y H:i');
                            ?> </td>
                        <td class='align-middle' rowspan="<?php echo $rowspanProducts ?>">Tiền mặt</td>
                        <td class='align-middle'
                            rowspan="<?php echo $rowspanProducts ?>"><?php echo totalCount($ordersDate) ?></td>
                        <td>
                            <a href="../detail_product/detail_product.php?id=<?php echo $dataProducts['products'][0]['id_product'] ?>"
                               class="text-black">
                                <?php
                                echo $dataProducts['products'][0]['name_product']; ?>
                            </a>
                        </td>
                        <td class='align-middle'>
                            <?php
                            $money = number_format($dataProducts['products'][0]['price'], 0,
                                '', '.');
                            echo "$money đ";
                            ?>
                        </td>
                        <td class="align-middle">
                            <?php
                            echo $dataProducts['counts'][0];
                            ?>
                        </td>
                        <td class='align-middle' rowspan="<?php echo $rowspanProducts ?>">
                            <?php $money = number_format(totalBill($ordersDate), 0,
                                '', '.');
                            echo $money ?>đ
                        </td>
                        <td rowspan="<?php echo $rowspanProducts ?>" class="align-middle <?php
                        if (getTypeOrder($ordersDate) === "Đang xử lý") {
                            echo "text-warning";
                        } elseif (getTypeOrder($ordersDate) === "Đã huỷ") {
                            echo "text-danger";
                        } elseif (getTypeOrder($ordersDate) === "Đang chờ huỷ") {
                            echo "text-dark";
                        } else {
                            echo "text-success";
                        } ?>">
                            <?php echo getTypeOrder($ordersDate) ?>
                        </td>
                        <td rowspan="<?php echo $rowspanProducts ?>" class="align-middle">
                            <?php if (getTypeOrder($ordersDate) !== "Thành công" &&
                                getTypeOrder($ordersDate) !== "Đang chờ huỷ" &&
                                getTypeOrder($ordersDate) !== "Đã huỷ") { ?>
                                <form method="post">
                                    <input type="text" name="create" value="<?php
                                    echo $ordersDate ?>" hidden="">
                                    <button name='remove' class="btn btn-danger text-white"><i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                    if (count($dataProducts['products']) >= 2) {
                        for ($i = 1; $i < count($dataProducts['products']); ++$i) {
                            ?>
                            <tr>
                                <?php
                                $name2 = $dataProducts['products'][$i]['name_product'];
                                ?>
                                <td>
                                    <a href="../detail_product/detail_product.php?id=<?php echo $dataProducts['products'][0]['id_product'] ?>"
                                       class="text-black">
                                        <?php
                                        echo $dataProducts['products'][$i]['name_product']; ?>
                                    </a>
                                </td>
                                <?php
                                $money = number_format($dataProducts['products'][$i]['price'], 0,
                                    '', '.');
                                echo "<td class='align-middle'>$money đ</td>";
                                $count = $dataProducts['counts'][$i];
                                echo "<td class='align-middle'>$count</td>"
                                ?>
                            </tr>
                        <?php }
                    }
                    ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <h5 class="my-1">Chưa có đơn hàng phù hợp</h5>
    <?php } ?>
</div>
</body>
</html>

