<?php 

    $filepath = realpath(dirname(__FILE__));
    include ($filepath. '/../models/BillModel.php');
?>

<?php 
    class BillController {
        public $model;
        public function __construct() {
            $this->model = new BillModel();
        }
        public function getAllBill() {
            $data = $this->model->getAllBill();
            return $data;
        }
        public function deleteBill($id) {
            $result = $this->model->deleteBill($id);
            return $result;
        }

        public function getBillById($id) {
            $data = $this->model->getBillById($id);
            return $data;
        }

        public function updateBill($id, $customer_id, $total, $address) {
            $count = 0;
            $result = NULL;
            $billInfo = ['customer_id', 'total', 'address'];
            for($i = 0; $i < count($billInfo); $i++) {
                if($_POST[$billInfo[$i]] == '') {
                    $result = -1;
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($billInfo)) {
                $resultEdit = $this->model->updateBill($$id, $customer_id, $total, $address);
                if($resultEdit == true) {
                    $result = 0;
                }else if($resultEdit == false) {
                    $result = 1;
                }
            }
            return $result;
        }
    }
?>