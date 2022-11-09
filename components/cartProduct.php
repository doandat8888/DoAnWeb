<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    if(isset($_GET['cartid'])) {
        if($_GET['cartid'] != '') {
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                for ($i = 0; $i < count($cart); $i++) {
                    unset($cart[$_GET['cartid']]);
                }
                $_SESSION['cart'] = $cart;
                $prod_price_total = 0;
                foreach ($_SESSION['cart'] as $value) {
                    $prod_price_total += $value['prod_price_total'];
                }
                $_SESSION['prod_price_total'] = $prod_price_total;
            }
        }
    }
    
?>
<form action="../../controllers/cartAction.php" method="POST">
    <?php
        $total_cart_price = 0;
        if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))):
            if(sizeof($_SESSION['cart'])>0):
                foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
                    <?php $total_cart_price += $prod_price_total?>
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-3">
                                    <a href="../../views/detailProduct/index.php?page=detailproduct&id=<?= $prod_id ?>">
                                        <img src="<?= $prod_image ?>" class="cart-item-img" alt="product-img">
                                    </a>
                                </div>
                                <div class="col-9">
                                    <a href="../../views/detailProduct/index.php?page=detailproduct&id=<?= $prod_id ?>" class="text-decoration-none">
                                        <div class="cart-item-name">
                                            <?= $prod_name ?>
                                        </div>
                                    </a>
                                    <div class="cart-item-color-size">
                                        <div class="color">
                                            Màu sắc: <?= $prod_color ?>
                                        </div>
                                        <div class="size">
                                            Size: <?= $prod_size ?>
                                        </div>
                                    </div>
                                    <div class="cart-item-quantity-price">
                                        <div class="cart-item-quantity">
                                            <input class='form-control-quantity border border-1' type='number' name='prod_quantity_up[<?=$cart_id?>]' value='<?= $prod_quantity ?>' min='1' max='<?= $prod_quantity_max ?>'/>; 
                                        </div>
                                        <div class="cart-item-price"><?= currency_format($prod_price) ?></div>
                                        <!-- <input type="hidden" name="prod_id[]" value="<?= $prod_id ?>">
                                        <button type="submit" class="btn btn-light" name="cartaction" value="removeFromCart">
                                            <span class="material-symbols-outlined del-icon">
                                                delete
                                            </span>
                                        </button>    --> 
                                        <a href="../../views/cart/index.php?cartid=<?= $cart_id?>">
                                            <span class="material-symbols-outlined del-icon">
                                                delete
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php
                endforeach;
            else:
                echo'
                <div class="col-12 mb-4">
                    <img src="../../src/img/nocart.png" class="cart-img w-100 p-3" alt="">
                    <h3 class="text-center" >Giỏ hàng rỗng</h3>
                </div>';
            endif;
        else:
            echo'
                <div class="col-12 mb-4">
                    <img src="../../src/img/nocart.png" class="cart-img w-100 p-3" alt="">
                    <h3 class="text-center" >Giỏ hàng rỗng</h3>
                </div>';
        endif;
    ?>
</form>
