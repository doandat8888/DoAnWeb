<?php
    class Bill_detail{
        private $id;
        private $bill_id;
        private $product_name;
        private $product_quantity;
        private $product_color;
        private $product_size;
        private $product_price;
        private $status;

        public function getId() {return $this->id;}
        public function getBillID() {return $this->bill_id;}
        public function getProductName() {return $this->product_name;}
        public function getProductQuantity() {return $this->product_quantity;}
        public function getProductColor() {return $this->product_color;}
        public function getProductSize() {return $this->product_size;}
        public function getProductPrice() {return $this->product_price;}
        public function getStatus() {return $this->status;}

        public function __construct($id, $bill_id, $product_name, $product_quantity, $product_color, $product_size, $product_price, $status)
        {
            $this->id = $id;
            $this->bill_id = $bill_id;
            $this->product_name = $product_name;
            $this->product_quantity = $product_quantity;
            $this->product_color = $product_color;
            $this->product_size = $product_size;
            $this->product_price = $product_price;
            $this->status = $status;
        }
    }
?>