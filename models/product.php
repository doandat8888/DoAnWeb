<?php 
    class Product {
        private $id;
        private $name;
        private $color;
        private $size;
        private $price;
        private $quantity;
        private $type;
        private $description;
        private $category_id;
        private $image01;
        private $image02;
        private $status;

        public function __construct($id, $name, $color, $size, $price, $quantity, $type, $description, $category_id, $image01, $image02, $status) {
            $this->id = $id;
            $this->name = $name;
            $this->color = $color;
            $this->size = $size;
            $this->price = $price;
            $this->quantity = $quantity;
            $this->type = $type;
            $this->description = $description;
            $this->category_id = $category_id;
            $this->image01 = $image01;
            $this->image02 = $image02;
            $this->status = $status;
        }

        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getColor() {return $this->color;}
        public function getSize() {return $this->size;}
        public function getPrice() {return $this->price;}
        public function getQuantity() {return $this->quantity;}
        public function getType() {return $this->type;}
        public function getDescription() {return $this->description;}
        public function getCategoryId() {return $this->category_id;}
        public function getImage01() {return $this->image01;}
        public function getImage02() {return $this->image02;}
        public function getStatus() {return $this->status;}
    }
?>