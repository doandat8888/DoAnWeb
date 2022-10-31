<?php
    include_once "../../controllers/billDetailController.php";
    $detailBillController = new BillDetailController();
    $productController = new ProductController();
    if ($result == true){
        echo "<script type='text/javascript'>alert('Thêm hóa đơn thành công');</script>";
        if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))){
            if(count($_SESSION['cart']) > 0){
                // for($i = 0; $i < count($_SESSION['cart']); $i++){
                //     // $quantityBuy = $_SESSION['cart'][$i][5];
                //     // $name = $_SESSION['cart'][$i][0];
                //     $detailBillController->setBillDetail($billId, $_SESSION['cart'][$i][0], $_SESSION['cart'][$i][5], $_SESSION['cart'][$i][4], strtolower( $_SESSION['cart'][$i][3]), $_SESSION['cart'][$i][2]);
                //     $productController->getProductByNameProduct($_SESSION['cart'][$i][5], $_SESSION['cart'][$i][0]);
                // }

                foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
                    <?php
                        $detailBillController->setBillDetail($billId, $prod_name, $prod_quantity, $prod_color, $prod_size, $prod_price);
                        $productController->getProductByNameProduct($prod_quantity, $prod_name);
                    ?>
                <?php
                endforeach;
            }
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Đã có lỗi xảy ra. Vui lòng thử lại');</script>";
    }
?>