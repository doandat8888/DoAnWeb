<?php 
    if($result == -1) {
        echo "<script type='text/javascript'>alert('Vui lòng nhập tên danh mục sản phẩm');</script>";
    }else if($result == 1) {
        echo "<script type='text/javascript'>alert('Danh mục sản phẩm đã tồn tại');</script>";
    }else if($result == 0) {
        echo "<script type='text/javascript'>alert('Cập nhật danh mục sản phẩm thành công');</script>";
    }
?>