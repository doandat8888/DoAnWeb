<?php 
    if(isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        include "../../controllers/productController.php";
        $controller = new ProductController();
        $data = $controller->getProductByName($keyword);
    }
?>