<?php 
    class CategoryProductModel {
        private $category_id;
        private $category_name;
        private $category_status;
        
        public function getCategotyId() {return $this->category_id;}
        public function getCategoryName() {return $this->category_name;}
        public function getCategoryStatus() {return $this->category_status;}

        public function __construct($category_id, $category_name, $category_status) {
            $this->category_id = $category_id;
            $this->category_name = $category_name;
            $this->category_status = $category_status;
        }

        public function __toString()
        {
            return "CategoryProduct($this->category_id, $this->category_name, $this->category_status)";
        }

        public function getCategoryList()
        {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL($link,"select * from categories");
            $data = $result;
            giaiPhongBoNho($link,$result);
            return $data;
        }

        public function getCategory($id)
        {   
            $allCategory = $this->getCategoryList();
            foreach($allCategory as $cate){
                if ($cate->getId()===$id) {
                    return $cate;
                }
            }
            return null;
        }
    }
?>