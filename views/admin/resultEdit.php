<?php 
    if($result === -1) {
        echo "<script type='text/javascript'>alert('Vui lòng nhập đủ thông tin sản phẩm');</script>";
    }else if($result == 1) {
        echo "<script type='text/javascript'>alert('Có lỗi xảy ra');</script>";
    }else if($result == 0) {
        echo "<script type='text/javascript'>alert('Cập nhật sản phẩm thành công');</script>";
    }
?>
