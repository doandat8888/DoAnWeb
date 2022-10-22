<?php
    $filepath = realpath(dirname(__FILE__));
    class billDetailModel{
        //Thêm mới
        public function setBillDetail($link, $bill_id, $product_name, $product_quantity, $product_color, $product_size, $product_price){
            $query = "INSERT INTO `detail_bill` (`bill_id`, `product_name`, `product_quantity`, `product_color`, `product_size`, `product_price`, `status`) VALUES ('$bill_id', '$product_name', '$product_quantity', '$product_color', '$product_size', '$product_price', 1)";
            $result = chayTruyVanKhongTraVeDL($link, $query);
            return $result;
        }
    }
?>