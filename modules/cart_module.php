<?php
    function addToCart($item){
        if (isset($_SESSION['cart'])){
            if(array_key_exists($item['id'], $_SESSION['cart'])){
                // echo "<script>alert('Sản phẩm này đã có trong giỏ hàng')</script>";
                // echo "<script>window.location = 'index.php'</script>";
                echo "<h1 style='margin-left:1rem;'>Item in cart</h1>";
                print_r($_SESSION['cart']);
            }
            else{
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = $item;
                print_r($_SESSION['cart']);
            }
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