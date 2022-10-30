<?php 
    include_once "../../controllers/productController.php";
    include_once "../../controllers/categoryProductController.php";
?>
<?php 
    foreach ($data as $product) {
        
        $description = $product->getDescription();
        echo "
            <form method='post' action='./index.php?page=manage-product&id=".$product->getId()."'>
                <div class='product-info-list col-12 d-flex'>
                    <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                        <div class='product-info-item-title'>Tên sản phẩm</div>
                        <input type='text' class='product-info-item-input' name='pro-name' value = '" . $product->getName() . "' />
                    </div>
                    <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                        <div class='product-info-item-title'>Màu sắc</div>
                        <select title='Chọn màu sắc' class='selectpicker product-info-item-input' name='pro-color[]' id='color' multiple required>
                            ";?>
                                <?php 
                                    $arraycolor = array(
                                        "blue" => "Xanh dương",
                                        "black" => "Đen",
                                        "yellow" => "Vàng",
                                        "green" => "Xanh lá",
                                        "pink" => "Hồng",
                                        "red" => "Đỏ",
                                        "white" => "Trắng",
                                        "brown" => "Nâu",
                                        "orange" => "Cam",
                                        "gray" => "Xám",
                                    );
                                    
                                    foreach ($arraycolor as $key => $val) {
                                        $colorStr = $product->getColor();
                                        if(str_contains($colorStr, $key)) {
                                            echo "<option value='".$key."' style='color: var(--$key);' selected>$val</option>";
                                        }else {
                                            echo "<option value='".$key."' style='color: var(--$key);'>$val</option>";
                                        }
                                    }
                                ?>
                                <?php 
                            echo "
                        </select>
                    </div>
                    <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                        <div class='product-info-item-title'>Kích thước</div>
                        <select title='Chọn màu sắc' class='selectpicker product-info-item-input' name='pro-size[]' id='size' multiple required>
                            ";?>
                                <?php 
                                    $arraysize = array(
                                        "s" => "S",
                                        "m" => "M",
                                        "l" => "L",
                                        "xl" => "XL",
                                        "xxl" => "XXL",
                                    );
                                    
                                    foreach ($arraysize as $key => $val) {
                                        $sizeStr = $product->getSize();
                                        if(str_contains($sizeStr, $key)) {
                                            echo "<option value='".$key."'' selected>$val</option>";
                                        }else {
                                            echo "<option value='".$key."''>$val</option>";
                                        }
                                    }
                                ?>
                                <?php 
                            echo "
                        </select>
                    </div>
                    <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                        <div class='product-info-item-title'>Nhập giá</div>
                        <input type='text' class='product-info-item-input' name='pro-price' value=" . $product->getPrice() . ">
                    </div>
                    <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                        <div class='product-info-item-title'>Nhập số lượng</div>
                        <input type='text' class='product-info-item-input' name='pro-quantity' value=" .$product->getQuantity() . ">
                    </div>
                    <div class='product-info-item col-12 col-sm-12 col-lg-12'>
                        <div class='product-info-item-title'>Mô tả</div>
                        <textarea class='product-info-item-input' name='pro-description'>$description</textarea>
                    </div>
                    <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                        <div class='product-info-item-title'>Loại</div>
                        <select class='product-info-item-input' name='pro-type'>
                            ";?>
                                <?php
                                    include_once "../../controllers/typeController.php";
                                    $typeController = new TypeController();
                                    $typeController->getTypeListUpdateProduct($product->getType());
                                ?>
                            <?php 
                            echo "
                        </select>
                    </div>
                    <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                        <div class='product-info-item-title'>Danh mục</div>
                        <select class='product-info-item-input' name='pro-category'>
                            ";?>
                                <?php
                                $categoryProductController = new CategoryProductController();
                                $categoryProductController->getCategoryByIdUpdateProduct($product->getCategoryId()); 
                            ?>
                            <?php 
                            echo "
                        </select>' 
                    </div>
                    <div class='product-info-item col-12'>
                        <div class='product-info-item-title'>Link ảnh 1</div>
                        <input type='text' class='product-info-item-input' name='pro-img-01' value=" . $product->getImage01() . ">
                    </div>
                    <div class='product-info-item col-12'>
                        <div class='product-info-item-title'>Link ảnh 2</div>
                        <input type='text' class='product-info-item-input' name='pro-img-02' value=" . $product->getImage02() . ">
                    </div>
                </div>
                <div class='footer'>
                    <button class='edit action-btn' type='submit' name='edit-submit'>
                        Cập nhật
                    </button>
                    <a href='./index.php?page=manage-product'>
                        <button class='previous action-btn' type='submit'>Trở lại</button>
                    </a>
                </div>
            </form>
        ";
    }
?>