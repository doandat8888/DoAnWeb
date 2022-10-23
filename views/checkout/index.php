<?php
    session_start();
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="./style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <title>Home</title>
    </head>
    <body>
        <div class="container">
            <?php 
                include_once "../../components/header.php";
            ?>
            <div class="checkout-body">
                <div class="row">
                    <form action="#" method="POST" style="display: flex;" onsubmit="javascript: return getTotal();" class="checkout-body-form row">
                        <div class="col-lg-6 col-md-12 col-12 checkout-body-left">           
                            <div class="checkout-info">
                                <div class="checkout-info-title">
                                    Thông tin giao hàng
                                </div>
                                <div class="checkout-info-input">
                                    <input name="checkout-info-name" type="text" class="checkout-info-input-item" placeholder="* Họ và tên">
                                    <input name="checkout-info-email" type="text" class="checkout-info-input-item" placeholder="* Email">
                                    <input name="checkout-info-number" type="text" class="checkout-info-input-item" placeholder="* Số điện thoại">
                                    <input name="checkout-info-address" type="text" class="checkout-info-input-item" placeholder="* Địa chỉ">
                                    <div class="checkout-info-input-txt">
                                        * là trường không được để trống
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-payment">
                                <div class="checkout-payment-title">
                                    Phương thức thanh toán
                                </div>
                                <div class="checkout-payment-input">
                                    <div class="checkout-payment-input-item">
                                        <input type="radio" name="checkout-method" value="credit-card" checked> 
                                        <span class="material-symbols-outlined checkout-payment-input-item-icon">
                                            credit_card
                                        </span>
                                        <div class="checkout-payment-input-item-txt">Thanh toán thẻ (ATM, Visa, Mastercard)</div>
                                    </div>
                                    <div class="checkout-payment-input-item">
                                        <input type="radio" name="checkout-method" value="shoppee-pay">
                                        <span class="material-symbols-outlined checkout-payment-input-item-icon">
                                            shopping_bag
                                        </span>
                                        <div class="checkout-payment-input-item-txt">Thanh toán bằng ví Shopee Pay</div>
                                    </div>
                                    <div class="checkout-payment-input-item">
                                        <input type="radio" name="checkout-method" value="cod">
                                        <span class="material-symbols-outlined checkout-payment-input-item-icon">
                                            local_shipping
                                        </span>
                                        <div class="checkout-payment-input-item-txt">Thanh toán ngay khi nhận hàng (COD)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-12 col-12 checkout-body-right">
                        <div class="cart-products checkout-products">
                            <?php 
                                if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))){
                                    if(count($_SESSION['cart']) > 0){
                                        $totalcartprice = 0;
                                        for($i = 0; $i < count($_SESSION['cart']); $i++ ){
                                            $totalpriceprod = (int)$_SESSION['cart'][$i][2] * (int)$_SESSION['cart'][$i][5];
                                            $totalcartprice += $totalpriceprod;
                                            echo '
                                                <div class="cart-item">
                                                    <div class="row">
                                                        <div class="col-3">
                                                                <img src="'.$_SESSION['cart'][$i][1].'" class="cart-item-img" alt="">
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="cart-item-name">
                                                                '.$_SESSION['cart'][$i][0].'
                                                            </div>
                                                        <div class="cart-item-color-size">
                                                            <div class="color">
                                                                Màu sắc: '.$_SESSION['cart'][$i][4].'
                                                            </div>
                                                            <div class="size">
                                                                Size: '.$_SESSION['cart'][$i][3].'
                                                            </div>
                                                        </div>
                                                        <div class="cart-item-quantity-price">
                                                            <div class="cart-item-quantity">
                                                                <div class="cart-item-quantity-minus">
                                                                    <span class="material-symbols-outlined minus-icon">
                                                                        remove
                                                                    </span>
                                                                </div>
                                                                <input type="text" value="'.$_SESSION['cart'][$i][5].'" min="0" max="10" class="cart-item-quantity-input" name="quantity">
                                                                <div class="cart-item-quantity-plus">
                                                                    <span class="material-symbols-outlined plus-icon">
                                                                        add
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="cart-item-price">'.currency_format($totalpriceprod).'</div>
                                                                <a href="index.php?delid='.$i.'">
                                                                    <span class="material-symbols-outlined del-icon">
                                                                        delete
                                                                    </span>
                                                                </a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            ';
                                        }
                                    }
                                    else{
                                        echo'
                                            <div class="col-12 mb-4">
                                                <img src="../../src/img/cart.png" class="cart-img" alt="">
                                            </div>
                                        ';
                                    }
                                }
                            ?>
                            
                        </div>

                            <div class="checkout-confirm">
                                <div class="checkout-confirm-title">
                                    Thông tin giỏ hàng
                                </div>
                                <div class="checkout-confirm-list">
                                    <div class="checkout-confirm-item">
                                        <div class="checkout-confirm-item-left">Tổng tiền hàng</div>
                                        <div class="checkout-confirm-item-right checkout-sum">
                                        <?php
                                            if(count($_SESSION['cart'])>0) {
                                                echo'
                                                <p class="cart-info-content-price-money">'.currency_format($totalcartprice).'</p>';
                                            }
                                            else {
                                                echo'
                                                <p class="cart-info-content-price-money">0</p>';
                                            }
                                        ?>
                                        </div>
                                    </div>
                                    <div class="checkout-confirm-item">
                                        <div class="checkout-confirm-item-left">Phí ship</div>
                                        <div class="checkout-confirm-item-right checkout-ship">20.000đ</div>
                                    </div>
                                    <div class="checkout-confirm-item">
                                        <div class="checkout-confirm-item-left">Thành tiền</div>
                                        <div class="checkout-confirm-item-right checkout-total"></div>
                                        <input id="hidden-total" type="hidden" name="total" value="">
                                    </div>
                                </div>
                                <button class="checkout-confirm-btn" type="submit" name="checkout-complete" onclick="getTotal()">
                                    Hoàn tất đơn hàng
                                </button>
                                <?php
                                    include_once "../../controllers/billController.php";
                                    include_once "../../controllers/billDetailController.php";
                                    include_once "../../controllers/productController.php";
                                    if(isset($_POST['checkout-complete'])){
                                        if(isset($_POST['checkout-method']) && isset($_POST['checkout-info-name']) && isset($_POST['checkout-info-email']) && isset($_POST['checkout-info-number']) && isset($_POST['total']) && isset($_POST['checkout-info-address'])){
                                            if($_POST['checkout-info-name']!=="" && $_POST['checkout-info-email']!=="" && $_POST['checkout-info-number']!=="" && isset($_POST['total'])!=="" && $_POST['checkout-info-address']!==""){
                                                // Nếu khách hàng nhập đủ thông tin
                                                $billController = new BillController();
                                                $detailBillController = new BillDetailController();
                                                $nameArr = $billController->formatName($_POST['checkout-info-name']);
                                                $listBills = $billController->getAllBill();
                                                if($listBills != NULL) {
                                                    $billId = count($listBills) + 1;  
                                                }else {
                                                    $billId = 1;
                                                }
                                                $countAddDetail = 0;                                            
                                                $result = $billController->setBill($billId, $nameArr[0], $nameArr[1], $_POST['checkout-info-email'], $_POST['checkout-info-number'], $_POST['total'], $_POST['checkout-info-address']);
                                                if ($result == true){
                                                    if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))){
                                                        if(count($_SESSION['cart']) > 0){
                                                            for($i = 0; $i < count($_SESSION['cart']); $i++){
                                                                $resultAddDetail = $detailBillController->setBillDetail($billId, $_SESSION['cart'][$i][0], $_SESSION['cart'][$i][5], $_SESSION['cart'][$i][4], strtolower( $_SESSION['cart'][$i][3]), $_SESSION['cart'][$i][2]);
                                                                if($resultAddDetail == 0) {
                                                                    $countAddDetail++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    if($countAddDetail == count($_SESSION['cart'])) {
                                                        echo "<script type='text/javascript'>alert('Thanh toán thành công');</script>";
                                                        //Cập nhật lại số lượng sản phẩm
                                                        $productController = new ProductController();
                                                        if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))){
                                                            if(count($_SESSION['cart']) > 0){
                                                                for($i = 0; $i < count($_SESSION['cart']); $i++){
                                                                    $quantityBuy = $_SESSION['cart'][$i][5];
                                                                    $name = $_SESSION['cart'][$i][0];
                                                                    $productBuy = $productController->getProductByNameProduct($name);
                                                                    $productQuantity = $productBuy[0]->getQuantity();
                                                                    $productQuantityNew = $productQuantity - $quantityBuy;
                                                                    $resultUpdate = $productController->updateQuantity($productQuantityNew, $name);
                                                                    if($resultUpdate) {
                                                                        echo "<script type='text/javascript'>alert('Cập nhật số lượng thành công');</script>";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                else{
                                                    echo "<script type='text/javascript'>alert('Đã có lỗi xảy ra. Vui lòng thử lại');</script>";
                                                }
                                            }
                                            else {
                                                // Nếu khách hàng nhập còn thiếu thông tin
                                                echo "<script type='text/javascript'>alert('Vui lòng nhập đủ thông tin');</script>";
                                            }
                                        }else{
                                            // Vì lý do nào đó trường POST bị thiếu
                                            echo "<script>alert('Error')</script>";
                                            echo "<script>window.location = 'index.php'</script>";
                                        }                         
                                    }        
                                ?>
                            </div>
                        </div>   
                    </form>
                </div>
                <?php 
                    include_once "../../components/footer.php";
                ?>
                <?php
                    include_once "../../components/scrollToTop.php"
                ?>
            </div>
        </div>
    </body>
    <script src="https://kit.fontawesome.com/644376ed9d.js" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</html>