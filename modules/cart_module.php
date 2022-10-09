<?php 
    function addToCart($item){
        if (isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            if (!array_key_exists($cart["id"], $cart)){
                $cart[$item["id"]] = $item;
            }
            $_SESSION['cart'] = $cart;
        }
        else{
            $cart[$item["id"]] = $item;
            $_SESSION['cart'] = $cart;
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
            $cart[$key][''] = $quantity;
            $_SESSION['cart'] = $cart;
        }
    }
?>