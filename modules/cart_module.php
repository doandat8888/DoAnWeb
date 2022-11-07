<?php
    session_start();
    function addToCart($product){
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            if(count($cart) == 0) {
                $cart[$product["cart_id"]] = $product;
                $_SESSION['cart'] = $cart;
                createProdPriceTotal();
            } else {
                for($i=0; $i<=count($cart); $i++) {
                    if (!($cart[$i]['prod_id'] == $product['prod_id'] && $cart[$i]['prod_size'] == $product['prod_size'] && $cart[$i]['prod_color'] == $product['prod_color'])) {
                        $cart[$product["cart_id"]] = $product;
                    } else {
                        $tmp = $cart[$i]['prod_quantity'] + $product['prod_quantity'];
                        if ($tmp > $product['prod_quantity_max']) {
                            $cart[$i]['prod_quantity'] = $product['prod_quantity_max'];
                            $cart[$i]['prod_price_total'] = $cart[$i]['prod_quantity'] * $cart[$i]['prod_price'];
                        } else {
                            $cart[$i]['prod_quantity'] = $tmp;
                            $cart[$i]['prod_price_total'] = $cart[$i]['prod_quantity'] * $cart[$i]['prod_price'];
                        }
                    }
                    $_SESSION['cart'] = $cart;
                    createProdPriceTotal();
                    break;
                }
            }
        } else {
            $cart[$product["cart_id"]] = $product;
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
        createProdPriceTotal();
    }

    function removeFromCart($key){ 
        if (isset($_SESSION['cart'])) {
            // $cart = $_SESSION['cart'];
            // for ($i = 0; $i < count($cart); $i++) {
            //     unset($cart[$key]);
            // }
            // $_SESSION['cart'] = $cart;
            // createProdPriceTotal();
            //var_dump($key);
        }
    }

        function updateCart($quantity){
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            foreach($quantity as $idcart => $productQuantity) {
                $cart[$idcart]['prod_quantity'] = $productQuantity;
                $cart[$idcart]['prod_price_total'] = $cart[$idcart]['prod_quantity'] * $cart[$idcart]['prod_price'];
            }
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
    }

    function emptyCart()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
            unset($_SESSION['prod_price_total']);
        }
    }

    function checkoutCart()
    {
        $sum = 0;
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION ['cart'];
            foreach ($cart as $value) {
                $sum += $value['prod_quantity'] * $value ['prod_price'];
            }
            return number_format($sum);
        }
    }
    function createProdPriceTotal()
    {
        if (isset($_SESSION['cart'])) {
            $prod_price_total = 0;
            foreach ($_SESSION['cart'] as $value) {
                $prod_price_total += $value['prod_price_total'];
            }
            $_SESSION['prod_price_total'] = $prod_price_total;
        }
    }
?>