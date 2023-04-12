<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/billModel.php');
?>

<?php
    class BillController{
        public $model;
        public function __construct() {
            $this->model = new billModel();
            $this->model1 = new billDetailModel();
        }

        public function setBill($id, $cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address){
            $billId = $id;
            $result = $this->model->setBill($id, $cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address);
            include_once "../../views/checkout/result-add-bill.php";
        }

        public function getAllBill($fullName, $email, $phoneNumber, $total, $address) {
            $listBill = $this->model->getAllBill();
            include_once "../../views/checkout/checkout-view.php";
        }

        public function getDashboardData() {
            $data = $this->model->getAllBill();
            include_once "../../views/admin/dashboard-view.php";
        }
    }
?>
