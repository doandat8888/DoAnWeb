<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/updateProduct.css">
    <title>Document</title>
</head>

<body>
    <?php
    include_once "../../controllers/productController.php";
    include_once "../../controllers/categoryProductController.php";
    $productController = new ProductController();
    $categoryProductController = new CategoryProductController();
    $categoryList = $categoryProductController->getCategoryList();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $products = $productController->getProductById($id);
        
        foreach ($products as $product) {
            $categories = $categoryProductController->getCategoryById($product->getCategoryId());
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
                            <input type='text' class='product-info-item-input' name='pro-color' value='" . $product->getColor() . "'>
                        </div>
                        <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                            <div class='product-info-item-title'>Kích thước</div>
                            <input type='text' class='product-info-item-input' name='pro-size' value='" . $product->getSize() . "'>
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
                                        $genderArr = array(
                                            "0" => "Nam",
                                            "1" => "Nữ",
                                            "2" => "Trẻ em"
                                        );
                                        foreach ($genderArr as $key=>$gender) {
                                            if($key == $product->getType()) {
                                                echo "
                                                    <option value='".$key."' selected>
                                                        ".$gender."
                                                    </option>
                                                ";
                                            }else {
                                                echo "
                                                    <option value='".$key."'>
                                                        ".$gender."
                                                    </option>
                                                ";
                                            }
                                        }
                                        
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
                                    $categoryNameSelected = $categories[0]->getName();
                                    foreach($categoryList as $category) {
                                        if($category->getStatus() == 1) {
                                            $categoryName = $category->getName();
                                            if($categoryName != $categories[0]->getName()) {
                                                echo "
                                                    <option value='".$category->getId()."'>$categoryName</option>
                                                ";
                                            }else {
                                                echo "
                                                    <option value='".$category->getId()."' selected>$categoryName</option>
                                                ";
                                            }
                                        }
                                    }
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
    }
    ?>
</body>

</html>