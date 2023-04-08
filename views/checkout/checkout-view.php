<?php 
    include_once "../../controllers/billController.php";
    $billController = new BillController();
    //Tách tên thành họ và phần còn lại
    function formatName($name){
        $result = array(2);

        $nameArr = explode(' ', trim($name));
        $last = substr($name, strlen($nameArr[0]));

        $result[0] = $nameArr[0];
        $result[1] = trim($last);

        return $result;
    }
    if($listBill != NULL) {
        $billId = count($listBill) + 1;  
    }else {
        $billId = 1;
    }
    // $nameArr = formatName($_POST['checkout-info-name']);
    // $billController->setBill($billId, $nameArr[0], $nameArr[1], $_POST['checkout-info-email'], $_POST['checkout-info-number'], $_POST['total'], $_POST['checkout-info-address']);
    $nameArr = formatName($fullName);
    $billController->setBill($billId, $nameArr[0], $nameArr[1], $email, $phoneNumber, $total, $address);
?>