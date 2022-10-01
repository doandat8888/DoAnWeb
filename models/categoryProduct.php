<?php
    class CategoryProduct {
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
    }
?>