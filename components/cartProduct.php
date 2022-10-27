<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../controllers/cartController.php');
?>
<?php
    if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))):
        $total_cart_price = 0;
        if(sizeof($_SESSION['cart'])>0):
            foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
                <?php $total_cart_price += $pricetotal?>
                    <div class="cart-item">
                            <div class="row">
                                <div class="col-3">
                                    <img src="<?= $prod_img ?>" class="cart-item-img" alt="">
                                </div>
                                <div class="col-9">
                                    <div class="cart-item-name">
                                        <?= $prod_name ?>
                                    </div>
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
                                            <div class="cart-item-quantity-minus">
                                                <span class="material-symbols-outlined minus-icon">
                                                    remove
                                                </span>
                                            </div>
                                            <input type="text" value=" <?= $prod_qty_cart ?>" min="0" max=" <?= $prod_qty_max ?>" class="cart-item-quantity-input" name="quantity">
                                            <div class="cart-item-quantity-plus">
                                                <span class="material-symbols-outlined plus-icon">
                                                    add
                                                </span>
                                            </div>
                                        </div>
                                        <div class="cart-item-price">'.currency_format( <?= $pricetotal ?>).'</div>
                                            <button type="submit" name="action" value="Remove" style="border: none; background: white;">
                                                <span class="material-symbols-outlined del-icon">
                                                    delete
                                                </span>
                                            </button>
                                        </div>
                                </div>
                            </div>
                    </div>
            <?php
            endforeach;
        else:
            echo'
            <div class="col-12 mb-4 overflow-hidden">
                <img src="../../src/img/nocart.png" class="cart-img w-100 p-3" alt="">
                <h3 class="text-center" >Giỏ hàng rỗng</h3>
            </div>';
        endif;
    else:
        echo'
            <div class="col-12 mb-4 overflow-hidden">
                <img src="../../src/img/nocart.png" class="cart-img w-100 p-3" alt="">
                <h3 class="text-center" >Giỏ hàng rỗng</h3>
            </div>';
    endif;
?>