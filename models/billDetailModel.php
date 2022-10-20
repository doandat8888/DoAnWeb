<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath. '/../modules/db_module.php');
    include ($filepath. '/./bill_detail.php');

    class billDetailModel{
        //Thêm mới
        function setBillDetail($bill_id, $product_name, $product_quantity, $product_color, $product_size, $product_price){
            $link = NULL;
            taoKetNoi($link);
            $query = "INSERT INTO `detail_bill` (`bill_id`, `product_name`, `product_quantity`, `product_color`, `product_size`, `product_price`, `status`) VALUES ('$bill_id', `$product_name`, `$product_quantity`, `$product_color`, `$product_size`, `$product_price`, 1)";
            $result = chayTruyVanKhongTraVeDL($link, $query);
            return $result;
        }
    }
?>