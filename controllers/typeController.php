<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/typeModel.php');
?>
<?php 
    class TypeController {
        public $model;
        public function __construct() {
            $this->model = new TypeModel();
        }

        public function getTypeListManageProduct() {
            $data = $this->model->getTypeList();
            include_once "../../views/admin/type-manage-product-view.php";
        }

        public function getTypeListProduct() {
            $data = $this->model->getTypeList();
            $filepath1 = realpath(dirname(__FILE__));
            include_once ($filepath1. '/../type-product-view.php');
        }

        public function getTypeListUpdateProduct($type) {
            $typeProduct = $type;
            $data = $this->model->getTypeList();
            include_once "../../views/admin/type-update-product-view.php";
        }
    }
?>