<?php 
    include_once "../../models\categoryProductModel.php";
?>
<?php 
    class CategoryProductController {
        public $model;
        public function __construct() {
            $this->model = new CategoryProductModel();
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
                    echo "<span class";
                }else if($result == false) {
                    header("Location: ../../category.php?msg=error");
                }
            }
        }
        
        
    }
?>