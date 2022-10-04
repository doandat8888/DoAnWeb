<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include_once "../../controllers/productController.php";
    $controller = new ProductController();
    
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $products = $controller->getProductById($id);
            foreach($products as $product) {
                echo "
                <div class='product-info-list col-12 d-flex'>
                    <div class='product-info-item col-6'>
                        <div class='product-info-item-title'>Tên sản phẩm</div>
                        <input type='text' class='product-info-item-input' name='pro-name' value = '".$product->getName()."' />
                    </div>
                    <div class='product-info-item col-6'>
                        <div class='product-info-item-title'>Màu sắc</div>
                        <input type='text' class='product-info-item-input' name='pro-color' value='".$product->getColor()."'>
                    </div>
                    <div class='product-info-item col-6'>
                        <div class='product-info-item-title'>Kích thước</div>
                        <input type='text' class='product-info-item-input' name='pro-size' value='".$product->getSize()."'>
                    </div>
                    <div class='product-info-item col-6'>
                        <div class='product-info-item-title'>Nhập giá</div>
                        <input type='text' class='product-info-item-input' name='pro-price' value=".$product->getPrice().">
                    </div>
                    <div class='product-info-item col-6'>
                        <div class='product-info-item-title'>Nhập số lượng</div>
                        <input type='text' class='product-info-item-input' name='pro-quantity' value=".$product->getQuantity().">
                    </div>
                    <div class='product-info-item col-6'>
                        <div class='product-info-item-title'>Mô tả</div>
                        <textarea class='product-info-item-input' name='pro-description' value=".$product->getDescription()."></textarea>
                    </div>
                    <div class='product-info-item col-6'>
                        <div class='product-info-item-title'>Loại</div>
                        <select class='product-info-item-input' name='pro-type'>
                            <option value='".$product->getType()."'>
                                ".$product->getType()."
                            </option>
                            
                            <option value='0'>Nam</option>
                            <option value='1'>Nữ</option>
                            <option value='2'>Trẻ em</option>
                        </select>
                    </div>
                    <div class='product-info-item col-6'>
                        <div class='product-info-item-title'>Danh mục</div>
                        <select class='product-info-item-input' name='pro-category'>
                            <option value='".$product->getCategoryId()."'>
                                ".$product->getCategoryId()."
                            </option>
                            <option value='0'>Đầm Thun</option>
                            <option value='1'>Đầm Dạ Hội</option>
                            <option value='2'>Áo Set</option>
                            <option value='3'>Áo Thun</option>
                            <option value='4'>Áo Polo</option>
                            <option value='5'>Áo Ngắn Tay</option>
                            <option value='6'>Quần Sooc</option>
                            <option value='7'>Áo Sơmi</option>
                        </select>' 
                    </div>
                    <div class='product-info-item col-12'>
                        <div class='product-info-item-title'>Link ảnh 1</div>
                        <input type='text' class='product-info-item-input' name='pro-img-01' value=".$product->getImage01().">
                    </div>
                    <div class='product-info-item col-12'>
                        <div class='product-info-item-title'>Link ảnh 2</div>
                        <input type='text' class='product-info-item-input' name='pro-img-02' value=".$product->getImage02().">
                    </div>
                </div>
                ";
            
    }
}
?>
</body>
</html>

