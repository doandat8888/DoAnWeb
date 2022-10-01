<?php 
    include_once "../../modules/db_module.php";
    include_once "../../validate_module.php";

    class CategoryProductModel {

        public function getCategoryList()
        {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL($link,"SELECT *FROM categories");
            $data = $result;
            giaiPhongBoNho($link,$result);
            return $data;
        }

        public function getCategory($categoryname)
        {   
            $allCategory = $this->getCategoryList();
            foreach($allCategory as $cate){
                if ($cate->getName()===$categoryname) {
                    return $cate;
                }
            }
            return null;
        }

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
    }
?>