<?php 
    include_once "../../controllers/categoryProductController.php";
?>

<?php
    $categoryProductController = new CategoryProductController();
    $categoryProductController->getCategoryListUpdateProduct($data[0]->getName());
?>