<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/billDetailModel.php');
?>

<?php
    class BillDetailController{
        public $model;
        public function __construct() {
            $this->model = new billDetailModel();
        }

        public function setBillDetail($bill_id, $product_name, $product_quantity, $product_color, $product_size, $product_price){
            //$count = 0;
            $result = NULL;
            // $billDetailInfo = ['billID', 'prod-name', 'prod-quant', 'prod-color', 'prod-size', 'prod-price'];
            // for($i = 0; $i < count($billDetailInfo); $i++) {
            //     if($_POST[$billDetailInfo[$i]] == '') {
            //         $result = -1;
            //         break;
            //     }else {
            //         $count++;
            //     }
            // }
            // if($count == count($billDetailInfo)) {
                $resultInsert = $this->model->setBillDetail($bill_id, $product_name, $product_quantity, $product_color, $product_size, $product_price);
                // if($result == true) {
                //     header('Location: ../../views/admin/index.php?msg=done');
                // }else if($result == false) {
                //     header('Location: ../../views/admin/index.php?msg=productname-existed');
                // }
                if($resultInsert) {
                    $result = 0;
                }else if($resultInsert == false) {
                    $result = 1;
                }
            //}
            include_once "../../views/checkout/result-add-detail-bill.php";
        }

        public function getNumberOfPurchases() {
            $data = $this->model->getNumberOfPurchases();
            include "../../views/admin/statistic-view.php";
        }

        public function getAllBillDetail() {
            $data = $this->model->getAllBillDetail();
            return $data;
        }
    }
?>
