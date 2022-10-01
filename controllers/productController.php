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
        
    }
?>