<?php 

    $filepath = realpath(dirname(__FILE__));
    include ($filepath. '/../models/detailBillModel.php');
?>

<?php 
    class DetailBillController {
        public $model;
        public function __construct() {
            $this->model = new DetailBillModel();
        }
        public function  getAllDetailBill() {
            $data = $this->model-> getAllDetailBill();
            return $data;
        }

        public function setDetailBill($bill_id, $pro_id, $pro_name, $pro_qty, $pro_color, $pro_size, $pro_price) {
            $count = 0;
            $result = NULL;
            $detalBillInfo = ['bill_id', 'pro-id', 'pro-name', 'pro-qty', 'pro-color', 'pro-size', 'pro-price'];
            for($i = 0; $i < count($detalBillInfo); $i++) {
                if($_POST[$detalBillInfo[$i]] == '') {
                    $result = -1;
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($detalBillInfo)) {
                $resultInsert = $this->model->setDetailBill($bill_id, $pro_id, $pro_name, $pro_qty, $pro_color, $pro_size, $pro_price);
                if($resultInsert == true) {
                    $result = 0;
                }else if($resultInsert == false) {
                    $result = 1;
                }
            }
            return $result;
        }

        public function getDetailBillById($id) {
            $data = $this->model->getDetailBillById($id);
            return $data;
        }
    }
?>