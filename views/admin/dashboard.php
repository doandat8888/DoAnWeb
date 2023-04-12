<?php
    include_once "../../controllers/billController.php";
    include_once "../../controllers/billDetailController.php";
    $billController = new BillController();
    $billController->getDashboardData();
?>