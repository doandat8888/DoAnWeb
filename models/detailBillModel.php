<?php
    include_once "../../modules/db_module.php";
    include_once "../../models/bill.php";
    include_once "../../validate_module.php";

    class DetailBillModel {
        public function getAllDetailBill() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from detail_bill WHERE `status` = 1";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $detailbill = new DetailBill($rows["bill_id"], $rows["product_id"], $rows["product_name"],$rows["product_qty"], $rows["product_color"], $rows["product_size"], $rows["product_price"], $rows["status"]);
                    array_push($data, $detailbill);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function setDetailBill($bill_id, $pro_id, $pro_name, $pro_qty, $pro_color, $pro_size, $pro_price, $status) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "INSERT INTO `deatil_bill` (`bill_id`, `product_id`, `product_name`, `product_quantity`,`product_color`,`product_size`,`product_price`, `status`) VALUES ('$bill_id', '$pro_id', '$pro_name', '$pro_qty', '$pro_color', '$pro_size', '$pro_price', 1)";
                $setdbill = chayTruyVanKhongTraVeDL($link, $query);
                if($setdbill) {
                    $result = true;
                }
            return $result;
        }  

        public function getDetailBillById($id) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from detail_bill WHERE `bill_id` = $id";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $dbill = new DetailBill($rows["id"], $rows["product_id"], $rows["product_name"],$rows["product_qty"], $rows["product_color"], $rows["product_size"], $rows["product_price"], $rows["status"]);
                    array_push($data, $dbill);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }    
?>