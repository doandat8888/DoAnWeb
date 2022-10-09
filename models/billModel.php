<?php
    include_once "../../modules/db_module.php";
    include_once "../../models/bill.php";
    include_once "../../validate_module.php";

    class BillModel {
        public function getAllBill() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from bills WHERE `status` = 1";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $bill = new Bill($rows["id"], $rows["customer_id"], $rows["total"], $rows["addresss"], $rows["status"]);
                    array_push($data, $bill);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getBillById($id) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from bill WHERE `id` = $id";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $bill = new Bill($rows["id"], $rows["customer_id"], $rows["total"], $rows["address"], $rows["status"]);
                    array_push($data, $bill);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function deleteBill($id) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "UPDATE bill SET `status`= 0 WHERE `id` = $id";
            $deletebill = chayTruyVanKhongTraVeDL($link, $query);
            if($deletebill) {
                $result = true;
            }else {
                $result = false;
            }
            return $result;
        }

        public function updateBill($id, $customer_id, $total, $address) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "UPDATE bill SET `customer_id`= '$customer_id', `total` = '$total', `size` = '$address',  WHERE `id` = $id";
            $updateBill = chayTruyVanKhongTraVeDL($link, $query);
            if($updateBill) {
                $result = true;
            }else {
                $result = false;
            }
            return $result;
        }
    }    
?>