<?php
session_start();
    function addToCart($product){
        if (isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            //Nếu sản phẩm chưa có trong giỏ thì tiến hành Thêm.
            if(!array_key_exists($product["prod_id"], $cart))
            {
                //key của mảng sẽ lấy theo id của sản phẩm.
                $cart[$product["prod_id"]] = $product;
            }  
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
        else{
            $cart[$product["prod_id"]] = $product;
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
        createProdPriceTotal();
    }

    function removeFromCart($key){
        if (isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            unset($cart[$key]);
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
    }

    function updateCart($key, $quantity){
        if (isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            $cart[$key]['prod_quantity'] = $quantity;
            $_SESSION['cart'] = $cart;
            createProdPriceTotal();
        }
    }

    function emptyCart()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
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