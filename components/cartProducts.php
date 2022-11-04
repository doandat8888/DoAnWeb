<?php
    if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))){
        if(count($_SESSION['cart']) > 0){
            $totalcartprice = 0;
            foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
                <?php $totalcartprice += $prod_price?>
                    <div class="cart-item">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= $prod_image ?>" class="cart-item-img" alt="">
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
                                        <input type="text" value="<?= $prod_quantity ?>" min="0" max="10" class="cart-item-quantity-input" name="quantity" disabled>
                                    </div>
                                    <div class="cart-item-price"><?= currency_format($prod_price) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
            endforeach;
            
            
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