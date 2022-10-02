<?php 
    include_once "../../modules/db_module.php";
    include_once "../../validate_module.php";

    class CategoryProductModel {
        //Lấy ra danh sách danh mục sản phẩm
        public function getCategoryList() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from categories";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $ncategory = new CategoryProduct($rows["id"], $rows["name"], $rows["status"]);
                    array_push($data, $ncategory);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
        //Thêm một danh mục mới
        public function addCategory($categoryname)
        {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            if(existsCategoryProduct($link, $categoryname)) {
                giaiPhongBoNho($link, true);
                $result = false;
            }else {
                $categoryname = mysqli_real_escape_string($link, $categoryname);
                $query = "INSERT INTO `categories` (NULL, `name`, `status`) VALUES (, '$categoryname', 1)";
                $addcate = chayTruyVanKhongTraVeDL($link, $query);
                if($addcate) {
                    $result = true;
                }
            }
            return $result;
        }
        //Lấy danh mục theo tên danh mục
        public function getCategoryByName($categoryname) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from categories WHERE `name` LIKE '%$categoryname%'";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $scategory = new CategoryProduct($rows["id"], $rows["name"], $rows["status"]);
                    array_push($data, $scategory);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        } 
    }
?>