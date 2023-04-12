<?php 
    include_once "../../controllers/billDetailController.php";
    //Lấy tổng doanh thu
    $revenueValue = 0;
    $totalBill = 0;
    foreach($data as $bill) {
        $totalBill++;
        $totalStr = $bill->getTotal();
        $totalStr = str_replace("đ", "", $totalStr);
        $totalStr = str_replace(".", "", $totalStr);
        $totalValue = intval($totalStr);
        $revenueValue += $totalValue;
    }
    $revenueStr = strval(round($revenueValue / 1000000, 2));
    

    //Lấy số sản phẩm đã bán
    $totalSoldProduct = 0;
    $billDetailController = new BillDetailController();
    $listBillDetail = $billDetailController->getAllBillDetail();
    foreach($listBillDetail as $billDetail) {
        $productQuantity = $billDetail->getProductQuantity();
        $totalSoldProduct += $productQuantity;
    }
?>
<div class="dashboard-page">
    <div class="title">
        Tổng quan
    </div>
    <div class="row dashboard-body">
        <div class="col-12 col-sm-6 col-lg-4 dashboard-body-item">
            <div class="dashboard-item-content">
                <p class="dashboard-item-content-value"><?php echo $revenueStr?> triệu</p>
                <p class="dashboard-item-content-title">Doanh thu</p>
                
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 dashboard-body-item">
            <div class="dashboard-item-content">
                <p class="dashboard-item-content-value"><?php echo $totalSoldProduct?></p>
                <p class="dashboard-item-content-title">Sản phẩm đã bán</p>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 dashboard-body-item">
            <div class="dashboard-item-content">
                <p class="dashboard-item-content-value"><?php echo $totalBill?></p>
                <p class="dashboard-item-content-title">Đơn hàng</p>
            </div>
        </div>
    </div>
</div>