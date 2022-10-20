<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath. '/../modules/db_module.php');
    include ($filepath. '/./bill_detail.php');

    class billModel{
        //Thêm mới
        function setBill($cus_firstName, $cus_lastName, $phoneNumber, $total, $address){
            $link = NULL;
            taoKetNoi($link);
            $query = "INSERT INTO `bill` (`cus_firstName`, `cus_lastName`, `phoneNumber`, `total`, `address`, `status`) VALUES ('$cus_firstName', `$cus_lastName`, `$phoneNumber`, `$total`, `$address`, 1)";
            $result = chayTruyVanKhongTraVeDL($link, $query);
            return $result;
        }
    }
?>