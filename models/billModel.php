<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/db_module.php');
    include_once ($filepath. '/./bill.php');
   
    class billModel{
        
        //Thêm mới
        function setBill($id, $cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address){
            $link = NULL;
            taoKetNoi($link);
            $query = "INSERT INTO `bill` (`id`, `cus_firstName`, `cus_lastName`, `email`, `phoneNumber`, `total`, `address`, `status`) VALUES ('$id', '$cus_firstName', '$cus_lastName', '$email', '$phoneNumber', '$total', '$address', 1)";
            $result = chayTruyVanKhongTraVeDL($link, $query);
            return $result;
        }

        

        public function getAllBill() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $resultArr = [];
            //$resultArr[0] = $link;
            $data = array();
            $query = "SELECT * from bill";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $category = new Bill($rows["id"], $rows["cus_firstName"], $rows["cus_lastName"], $rows["email"], $rows['phoneNumber'], $rows['total'], $rows['address'], $rows['status']);
                    array_push($data, $category);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            //$resultArr[1] = $data;
            return $data;
        }

        public function getBillByLimit($limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from bill ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $category = new Bill($rows["id"], $rows["cus_firstName"], $rows["cus_lastName"], $rows["email"], $rows['phoneNumber'], $rows['total'], $rows['address'], $rows['status']);
                    array_push($data, $category);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }
?>