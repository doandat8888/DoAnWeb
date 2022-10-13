<?php
    require_once "../../modules/cart_module.php";

    if (isset($_POST['action'])){
        switch($_POST['action']){
            case 'add':
                $item = array('id'=>$_POST['product_id'], 'name'=>$_POST['product_name'], 'price'=>$_POST['product_price'], 'image'=>$_POST['product_img'], 'image'=>$_POST['product_color'], 'quantity'=>1);
                //unset($_SESSION['cart']);
                addToCart($item);
                break;
            case 'update':
                updateCart($_POST['product_id'], $_POST['quantity']);
                break;
            case 'remove':
                removeFromCart($_POST['product_id']);
                break;
            default:
                break;
        }
    }
?>