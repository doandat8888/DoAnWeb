<?php 

    $filepath = realpath(dirname(__FILE__));
    include ($filepath. '/../models/productModel.php');
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

        public function getAllProductByLimit($limit, $offset) {
            $data = $this->model->getAllProductByLimit($limit, $offset);
            return $data;
        }

        public function setProduct($name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02) {
            $count = 0;
            $result = NULL;
            $productInfo = ['pro-name', 'pro-color', 'pro-size', 'pro-price', 'pro-quantity', 'pro-type', 'pro-description', 'pro-category', 'pro-img-01', 'pro-img-02'];
            for($i = 0; $i < count($productInfo); $i++) {
                if($_POST[$productInfo[$i]] == '') {
                    $result = -1;
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($productInfo)) {
                $resultInsert = $this->model->setProduct($name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02);
                // if($result == true) {
                //     header('Location: ../../views/admin/index.php?msg=done');
                // }else if($result == false) {
                //     header('Location: ../../views/admin/index.php?msg=productname-existed');
                // }
                if($resultInsert == true) {
                    $result = 0;
                }else if($resultInsert == false) {
                    $result = 1;
                }
            }
            return $result;
        }

        public function deleteProduct($id) {
            $result = $this->model->deleteProduct($id);
            return $result;
        }

        public function getProductByName($name) {
            $data = $this->model->getProductByName($name);
            return $data;
        }

        public function getProductByNameLimit($name, $limit, $offset) {
            $data = $this->model->getProductByNameLimit($name, $limit, $offset);
            return $data;
        }

        public function getProductByType($type) {
            $data = $this->model->getProductByType($type);
            return $data;
        }

        public function getProductByTypeLimit($type, $limit, $offset) {
            $data = $this->model->getProductByTypeLimit($type, $limit, $offset);
            return $data;
        }

        public function getProductById($id) {
            $data = $this->model->getProductById($id);
            return $data;
        }

        // public function searchforProduct($searchstr){
        //     $data = $this->model->searchforProduct($searchstr);
        //     return $data;
        // }

        public function updateProduct($id, $name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02) {
            $count = 0;
            $result = NULL;
            $productInfo = ['pro-name', 'pro-color', 'pro-size', 'pro-price', 'pro-quantity', 'pro-type', 'pro-description', 'pro-category', 'pro-img-01', 'pro-img-02'];
            for($i = 0; $i < count($productInfo); $i++) {
                if($_POST[$productInfo[$i]] == '') {
                    $result = -1;
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($productInfo)) {
                $resultEdit = $this->model->updateProduct($id, $name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02);
                // if($result == true) {
                //     header('Location: ../../views/admin/index.php?msg=done');
                // }else if($result == false) {
                //     header('Location: ../../views/admin/index.php?msg=productname-existed');
                // }
                if($resultEdit == true) {
                    $result = 0;
                }else if($resultEdit == false) {
                    $result = 1;
                }
            }
            return $result;
        }
    }
?>