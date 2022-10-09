<?php 
    session_start();
    require_once "../../modules/cart_module.php";

    if (isset($_POST['addtocart'])){
        switch($_POST['addtocart']){
            case "Add":
                $item = array("id"=>$_POST['id'], "name"=>$_POST['name'], "price"=>$_POST['price'], "quantity"=>1);
                addToCart($item);
                break;
            case "Update":
                updateCart($_POST['id'], $_POST['quanity']);
                break;
            case "Remove":
                removeFromCart($_POST['id']);
                break;
            default:
                break;
        }
    }
?>