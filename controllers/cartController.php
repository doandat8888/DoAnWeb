<?php
    //require_once "../modules/cart_module.php";
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/cart_module.php');

if (isset($_POST['cartcontroller'])) {
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $cartid = count($_SESSION['cart']);
    $prodpricetotal = $_POST['prod_quantity'] * $_POST['prod_price'];
    $product = array(
        "cart_id" => $cartid,
        "prod_id" => $_POST['prod_id'], 
        "prod_name" => $_POST['prod_name'], 
        "prod_image" => $_POST['prod_image'],
        "prod_size" => $_POST['size'], 
        "prod_color" => $_POST['color'], 
        "prod_price" => $_POST['prod_price'],
        "prod_quantity" => $_POST['prod_quantity'],
        "prod_quantity_max" => $_POST['prod_quantity_max'], 
        "prod_price_total" => $prodpricetotal
    );
    
    if(isset($_POST['cartcontroller'])) {
        switch ($_POST["cartcontroller"]) {
            case "addToCart":
                addToCart($product);
                var_dump($_SESSION['cart']);
                // header('location: ../views/detailProduct/index.php?page=detailproduct&id='.$_POST['prod_id'].'');
                break;
            case "buyNow":
                addToCart($product);
                header('location: ../views/cart/index.php');
                break;
            default:
                break;
        }
    }
}

// if(isset($_POST['cartaction'])) {
//     switch ($_POST["cartaction"]) {
//         case "addToCart":
//             addToCart($product);
//             header('location: ../views/detailProduct/index.php?page=detailproduct&id='.$_POST['prod_id'].'');
//             break;
//         case "buyNow":
//             addToCart($product);
//             header('location: ../views/cart/index.php');
//             break;
//         default:
//             break;
//     }
// }
?>