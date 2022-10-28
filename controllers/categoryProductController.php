<?php 
    include_once "../../models/categoryProductModel.php";
?>
<?php 
    class CategoryProductController {
        public $model;
        public function __construct() {
            $this->model = new CategoryProductModel();
        }

        public function getCategoryListFilter() {
            $data = $this->model->getCategoryList();
            include_once "../../views/product/filter-product-category-view.php";
        }

        //Danh sách danh mục sản phẩm
        public function getCategoryListManageProduct() {
            $data = $this->model->getCategoryList();
            include_once "../../views/admin/category-manage-product.php";
        }

        public function getCategoryListUpdateProduct($name) {
            $nameSelected = $name;
            $data = $this->model->getCategoryList();
            include_once "../../views/admin/all-category-update-product-view.php";
        }

        public function getCategoryListPage() {
            $data = $this->model->getCategoryList();
            include_once "../../views/admin/page-list-category-view.php";
        }

        //Thêm một danh mục mới
        public function setCategory($categoryname) {
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
            include_once "../../views/admin/result-add-category.php";
        }

        public function getCategoryPageByName($categoryname) {
            $data = $this->model->getCategoryByName($categoryname);
            include_once "../../views/admin/page-list-category-view.php";
        }

        public function getCategoryByIdUpdateCategory($id) {
            $data = $this->model->getCategoryById($id);
            include_once "../../views/admin/category-update-view.php";
        }

        public function getCategoryByIdUpdateProduct($id) {
            $data = $this->model->getCategoryById($id);
            include_once "../../views/admin/category-update-product-view.php";
        }
        //xóa danh mục sản phẩm
        public function deleteCategory($id) {
            $result = $this->model->deleteCategory($id);
            include_once "../../views/admin/result-delete-category.php";
        }

        public function editCategory($id, $name) {
            $count = 0;
            $result = NULL;
            $categoryInfo = ['cat-name'];
            for($i = 0; $i < count($categoryInfo); $i++) {
                if($_POST[$categoryInfo[$i]] == '') {
                    $result = -1;
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($categoryInfo)) {
                $resultEdit = $this->model->editCategory($id, $name);
                if($resultEdit == true) {
                    $result = 0;
                }else if($resultEdit == false) {
                    $result = 1;
                }
            }
            include_once "../../views/admin/result-edit-category.php";
        }

        public function getAllCategoryByLimit($limit, $offset) {
            $data = $this->model->getAllCategoryByLimit($limit, $offset);
            include_once "../../views/admin/category-view.php";
        }

        public function getCategoryByNameLimit($name, $limit, $offset) {
            $data = $this->model->getCategoryByNameLimit($name, $limit, $offset);
            include_once "../../views/admin/category-view.php";
        }
    }
?>