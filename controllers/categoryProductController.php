<?php 
    include_once "../../models\categoryProductModel.php";
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
        public function addNewCategory($categoryname) {
            $count = 0;
            $ncategory = [NULL, 'name', 'status'];
            for($i = 0; $i < count($ncategory); $i++) {
                if($_POST[$ncategory[$i]] == '') {
                    header("Location: ../../category.php?msg=missing-info");
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($ncategory)) {
                $result = $this->model->addCategory($categoryname);
                if($result == true) {
                    header("Location: ../../category.php?msg=done");
                    echo "<span class='success'>Thêm danh mục thành công</span>";
                }else if($result == false) {
                    header("Location: ../../category.php?msg=error");
                    echo "<span class='error'>Danh mục đã tồn tại, thêm danh mục thất bại!</span>";
                }
            }
        }  
    }
?>