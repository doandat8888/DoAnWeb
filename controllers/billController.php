<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath. '/../models/billModel.php');
?>

<?php
    class BillController{
        public $model;
        public function __construct() {
            $this->model = new billModel();
        }

        public function setBill($cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address){
            $count = 0;
            $result = NULL;
            $billInfo = [$cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address];
            for($i = 0; $i < count($billInfo); $i++) {
                if($billInfo[$i] == '') {
                    $result = -1;
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($billInfo)) {
                $resultInsert = $this->model->setBill($cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address);
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
            }
            return $result;
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
