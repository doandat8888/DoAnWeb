<?php 
    if($result == -1) {
        echo "<script type='text/javascript'>alert('Vui lòng nhập đủ thông tin sản phẩm');</script>";
    }else if($result == 1) {
        echo "<script type='text/javascript'>alert('Tên sản phẩm đã tồn tại');</script>";
    }else if($result == 0) {
        echo "<script type='text/javascript'>alert('Thêm sản phẩm thành công');</script>";
    }
?>