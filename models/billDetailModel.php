<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/./bill_detail.php');
    include_once ($filepath. '/../modules/db_module.php');
    class billDetailModel{
        //Thêm mới
        public function setBillDetail($bill_id, $product_name, $product_quantity, $product_color, $product_size, $product_price){
            $link = NULL;
            taoKetNoi($link);
            $query = "INSERT INTO `detail_bill` (`bill_id`, `product_name`, `product_quantity`, `product_color`, `product_size`, `product_price`, `status`) VALUES ('$bill_id', '$product_name', '$product_quantity', '$product_color', '$product_size', '$product_price', 1)";
            $result = chayTruyVanKhongTraVeDL($link, $query);
            return $result;
        }

        public function getNumberOfPurchases() {
            $link = NULL;
            taoKetNoi($link);
            $data = [];
            $query = "SELECT product_name, COUNT(*) AS number_of_purchases FROM detail_bill GROUP BY product_name";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
            return $data;
        }
    }
?>