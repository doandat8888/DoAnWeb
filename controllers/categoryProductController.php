<?php 
    include_once "../../models/categoryProductModel.php";
?>
<?php 
    class CategoryProductController {
        public $model;
        public function __construct() {
            $this->model = new CategoryProductModel();
        }

        //Danh sách danh mục sản phẩm
        public function getCategoryList() {
            $data = $this->model->getCategoryList();
            return $data;
        }

        //Thêm một danh mục mới
        public function setCategory($categoryname) {
            $count = 0;
            $result = NULL;
            if($_POST['cat-name'] == '') {
                $result = -1;
            }else {
                $resultAddNew = $this->model->setCategory($categoryname);
                    if($resultAddNew == true) {
                        $result = 0;
                    }else if($resultAddNew == false) {
                        $result = 1;
                    }
            }
            return $result;
        }
        //Lấy ra danh mục theo tên danh mục
        public function getCategoryByName($categoryname) {
            $data = $this->model->getCategoryByName($categoryname);
            return $data;
        }
        //Lấy ra danh mục sản phẩm theo id danh mục
        public function getCategoryById($id) {
            $data = $this->model->getCategoryById($id);
            return $data;
        }
        //xóa danh mục sản phẩm
        public function deleteCategory($id) {
            $result = $this->model->deleteCategory($id);
            return $result;
        }
        //cập nhật danh mục sản phẩm
        public function editCategory($id, $name) {
            $result = $this->model->editCategory($id, $name);
            return $result;
        }
    }
?>