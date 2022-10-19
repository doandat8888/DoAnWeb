<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>
<?php
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    //Empty cart
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['cart']);
    //Delete product from cart
    if(isset($_GET['delid'])&&($_GET['delid']>=0)) {
        array_splice($_SESSION['cart'], $_GET['delid'], 1);
    }
    if(isset($_POST['action'])) {
        if($_POST['action'] == "addtocart") {
            $prod_name = $_POST['prod_name'];
            $prod_image = $_POST['prod_image'];
            $prod_price = $_POST['prod_price'];
            $prod_size = $_POST['prod_size'];
            $prod_color = $_POST['prod_color'];
            $prod_quantity = $_POST['prod_quantity'];
            $prod_id = $_POST['prod_id'];
            
            //Product in cart?
            $flag = 0;
            $nquantity = 0;
            for ($i=0 ; $i < sizeof($_SESSION['cart'])  ; $i++ ) { 
                if($_SESSION['cart'][$i][6] == $prod_id) {
                    $flag = 1;
                    $nquantity = $prod_quantity + $_SESSION['cart'][$i][5];
                    $_SESSION['cart'][$i][5] = $nquantity;
                    break;
                }
            }
            if($flag == 0) { //sp chưa tồn tại trong giỏ thì thêm mới
                $product=[$prod_name, $prod_image, $prod_price, $prod_size, $prod_color, $prod_quantity, $prod_id];
                $_SESSION['cart'][] = $product;
            }
        }
    }
?>
<?php
    if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))) {
        if(sizeof($_SESSION['cart'])>0) {
            $totalcartprice = 0;
            for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                $totalpriceprod = (int)$_SESSION['cart'][$i][2] * (int)$_SESSION['cart'][$i][5];
                $totalcartprice += $totalpriceprod;
                echo'
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
                                            <span class="material-symbols-outlined del-icon" style="color: black; !important">
                                                delete
                                            </span>
                                        </a> 
                                    </div>
                            </div>
                        </div>
                    </div>';
            }
        }
        else {
            echo'
            <div class="cart-item">
                <div class="col-12 mb-4">
                </div>
            </div>';
        }
    }
?>