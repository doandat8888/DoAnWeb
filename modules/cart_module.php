<?php
    session_start();
    function addToCart($product){
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];

            if (!array_key_exists($product["prod_id"], $cart)) {
                $cart[$product["prod_id"]] = $product;
            } else {
                $tmp = $cart[$product["prod_id"]]['prod_quantity'] + $product['prod_quantity'];
                if ($tmp > $product['prod_quantity_max']) {
                    $cart[$product["prod_id"]]['prod_quantity'] = $product['prod_quantity_max'];
                    $cart[$product["prod_id"]]['prod_price_total'] = $cart[$product["prod_id"]]['prod_quantity'] * $cart[$product['prod_id']]['prod_price'];
                } else {
                    $cart[$product["prod_id"]]['prod_quantity'] = $tmp;
                    $cart[$product["prod_id"]]['prod_price_total'] = $cart[$product["prod_id"]]['prod_quantity'] * $cart[$product['prod_id']]['prod_price'];
                }
            }
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        } else {
            $cart[$product["prod_id"]] = $product;
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
        createProdPriceTotal();
    }

    function removeFromCart($key){
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            for ($i = 0; $i < count($cart); $i++) {
                unset($cart[$key[$i]]);
            }
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
    }

    function updateCart($key, $quantity){
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            foreach($quantity as $id => $productQuantity) {
                $cart[$id]['prof_quantity_cart'] = $productQuantity;
                $cart[$id]['prod_price_total'] = $cart[$id]['prof_quantity_cart'] * $cart[$id]['prod_price'];
            }
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
        
        // if (isset($_SESSION['cart'])) {
        //     $cart = $_SESSION['cart'];
        //     for ($i = 0; $i < count($cart); $i++) {
        //         $cart[$key[$i]]['prod_quantity_cart'] =  $quantity[$i];
        //         $cart[$key[$i]]['prod_price_total'] = $cart[$key[$i]]['prod_quantity_cart'] * $cart[$key[$i]]['prod_price'];
        //     }
        //     $_SESSION['cart'] = $cart;
        //     createProdPriceTotal();
        // }
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