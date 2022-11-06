<?php
require_once "../modules/cart_module.php";

if(isset($_POST['cartaction'])) {
    switch ($_POST["cartaction"]) {
        case "updateCart":
            updateCart($_POST['prod_quantity_up']);
            header('location: ../views/cart/index.php');
            break;
        case "removeFromCart":
            removeFromCart($_POST['prod_id']);
            //header('location: ../views/cart/index.php');
            break;
        case "emptyCart":
            emptyCart();
            header('location: ../views/cart/index.php');
            break;
        default:
            break;
        }
}
?>