<?php
    include_once "../../controllers/billController.php";
    include_once "../../controllers/billDetailController.php";
    $billDetailController = new BillDetailController();
    $billDetailController->getNumberOfPurchases();
?>


