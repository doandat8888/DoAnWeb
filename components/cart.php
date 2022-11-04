<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>
<div class="col-lg-4 col-md-4 col-9 cart">
    <div class="cart-header">
        <div class="cart-title">
            <div class="content">Giỏ hàng</div>
                <?php
                    if(isset($_SESSION['cart'])) {
                        $totalQuantity = 0;
                        foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
                        <?php
                            $totalQuantity += $prod_quantity;
                        ?>
                        <?php
                        endforeach;
                        if(count($_SESSION['cart'])>0) {
                            echo'
                            <div class="quantity">'.$totalQuantity.'</div>';
                        } else {
                            echo'
                            <div class="quantity">0</div>';
                        }
                    } else {
                        echo'
                        <div class="quantity">0</div>';
                    }
                    
                ?>
        </div>
        <i class="fa-solid fa-xmark cancel-icon"></i>
    </div>
    <?php if(isset($_SESSION['cart'])) {
            if(count($_SESSION['cart'])>0) {?>
                <div class="cart-products ">
                    <?php 
                        include_once "cartProducts.php";
                    ?>
                </div>
            <?php } else {?>
                <div class="cart-products">
                    <?php 
                        include_once "cartProducts.php";
                    ?>
                </div>
            <?php } ?>
        <?php } else {?>
            <div class="cart-products">
                <?php 
                    include_once "cartProducts.php";
                ?>
            </div>
        <?php } ?>
    <div class="cart-total">
        <div class="cart-total-title">Tổng cộng:</div>
        <?php
            if(isset($_SESSION['prod_price_total'])) {
                echo '<div class="cart-total-money">'.currency_format($_SESSION['prod_price_total']).'</div>';
            }
                    
        ?>
    </div>
    <?php
    if($_SERVER['PHP_SELF'] == '/index.php') {
        echo '
        <a href="../../views/cart/index.php" class="cart-btn-link">
            <div class="cart-btn-view">
                Xem giỏ hàng
            </div>
        </a>
        ';
    }
    else {
        echo '
        <a href="../../views/cart/index.php" class="cart-btn-link">
            <div class="cart-btn-view">
                Xem giỏ hàng
            </div>
        </a>
        ';
    }
    ?> 
</div>
