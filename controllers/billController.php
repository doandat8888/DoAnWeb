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
            
            $result = NULL;
            // $billInfo = [$cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address];
            // for($i = 0; $i < count($billInfo); $i++) {
            //     if($billInfo[$i] == '') {
            //         $result = -1;
            //         break;
            //     }else {
            //         $count++;
            //     }
            // }
            // if($count == count($billInfo)) {
                $result = $this->model->setBill($id, $cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address);
                //$result = $resultArr;
                // if($result == true) {
                //     header('Location: ../../views/admin/index.php?msg=done');
                // }else if($result == false) {
                //     header('Location: ../../views/admin/index.php?msg=productname-existed');
                // }
            //}
            return $result;
        }

        public function getAllBill() {
            return $this->model->getAllBill();
        }

        //Tách tên thành họ và phần còn lại
        public function formatName($name){
            $result = array(2);

            $nameArr = explode(' ', trim($name));
            $last = substr($name, strlen($nameArr[0]));

            $result[0] = $nameArr[0];
            $result[1] = trim($last);

            return $result;
        }
    }
?>
