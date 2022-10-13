<?php
    function addToCart($item){
        if (isset($_SESSION['cart'])){
            // $cart = $_SESSION['cart'];
            // if (!array_key_exists($cart["product_id"], $cart)){
            //     $cart[$item["product_id"]] = $item;
            // }
            // $_SESSION['cart'] = $cart;
            print_r($_SESSION['cart']);
        }
        else{
            $_SESSION['cart'][0] = $item;
            print_r($_SESSION['cart']);
        }
    }

    function removeFromCart($key){
        if (isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            unset($cart[$key]);
            $_SESSION['cart'] = $cart;
        }
    }

    function updateCart($key, $quantity){
        if (isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            $cart[$key]['quantity'] = $quantity;
            $_SESSION['cart'] = $cart;
        }
    }
?>