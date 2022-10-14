<?php
    function addToCart($item){
        if (isset($_SESSION['cart'])){

            $cart_id = array_column($_SESSION['cart'], 'id');
            
            if(in_array($item['id'], $cart_id)){
                print_r($_SESSION['cart']);
                echo "In cart";
                // echo "<script>alert('Sản phẩm này đã có trong giỏ hàng')</script>";
                // echo "<script>window.location = 'index.php'</script>";
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