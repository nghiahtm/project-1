<?php
include "history_controller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project1</title>
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
    <?php global $dataHistory;
    if (!empty($dataHistory)) { ?>
        <div>
            <div class="row">
                <div class="input-group rounded-2 col" id="datepicker">
                    <label class="pb-3 input-group d-flex flex-wrap">
                        <input

                                id="birth"
                                type="date"
                                name="birthday"
                                min='1900-01-01' max='2021-12-31'
                                value="<?php ?>"
                        />
                    </label>
                </div>
                <div class="col border-1">
                    <input type="text">
                </div>
            </div>
            <table class="table table-striped table-bordered table-sm my-2 text-center">
                <thead>
                <tr>
                    <th class="align-middle" scope="col" rowspan="2">Ngày mua</th>
                    <th class="align-middle" scope="col" rowspan="2">Phương thức thanh toán</th>
                    <th class="align-middle" scope="col" rowspan="2">Số lượng</th>
                    <th class="align-middle" scope="col" colspan="3">Mặt hàng</th>
                    <th class="align-middle" scope="col" rowspan="2">Tổng tiền</th>
                    <th class="align-middle" scope="col" rowspan="2">Trạng thái mua hàng</th>
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
                            <?php
                            echo $dataProducts['products'][0]['name_product']; ?>
                        </td>
                        <td>
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
                        } else {
                            echo "text-success";
                        } ?>">
                            <?php echo getTypeOrder($ordersDate) ?>
                        </td>
                    </tr>
                    <?php
                    if (count($dataProducts['products']) >= 2) {
                        for ($i = 1; $i < count($dataProducts['products']); ++$i) {
                            ?>
                            <tr>
                                <?php
                                $name2 = $dataProducts['products'][$i]['name_product'];
                                echo "<td>$name2</td>";
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
        <h5>Bạn hãy mua mua sản phẩm nào</h5>
    <?php } ?>
</div>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../header/get_count.js"></script>
</html>

