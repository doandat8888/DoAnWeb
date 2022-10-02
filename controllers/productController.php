<?php 
    //session_start();
    include "../../models/productModel.php";
?>

<?php 
    class ProductController {
        public $model;
        public function __construct() {
            $this->model = new ProductModel();
        }
        public function getAllProduct() {
            $data = $this->model->getAllProduct();
            return $data;
        }
        public function setProduct($name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02) {
            $count = 0;
            $productInfo = ['pro-name', 'pro-color', 'pro-size', 'pro-price', 'pro-quantity', 'pro-type', 'pro-description', 'pro-category', 'pro-img-01', 'pro-img-02'];
            for($i = 0; $i < count($productInfo); $i++) {
                if($_POST[$productInfo[$i]] == '') {
                    header('Location: ../../views/admin/manage-product.php?msg=missing-info');
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($productInfo)) {
                $result = $this->model->setProduct($name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02);
                if($result == true) {
                    header('Location: ../../views/admin/index.php?msg=done');
                }else if($result == false) {
                    header('Location: ../../views/admin/index.php?msg=productname-existed');
                }
            }
        }
        public function getProductByName($name) {
            $data = $this->model->getProductByName($name);
            return $data;
        }
        
    }
?>