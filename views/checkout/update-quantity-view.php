<?php 
    include_once "../../controllers/productController.php";
    $productController = new ProductController();
    $productQuantity = $data[0]->getQuantity();
    $productQuantityNew = $productQuantity - $quantityBuy;
    $productController->updateQuantity($productQuantityNew, $nameProduct);
?>