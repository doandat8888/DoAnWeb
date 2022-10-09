<?php
class DetailBill {
    private $id;
    private $pro_id;
    private $pro_name;
    private $pro_quatity;
    private $pro_color;
    private $pro_size;
    private $pro_price;
    private $status;
    
    public function __construct($id, $pro_id, $pro_name, $pro_quantity, $pro_color, $pro_size, $pro_price, $status) {
        $this->id = $id;
        $this->pro_id = $pro_id;
        $this->pro_name = $pro_name;
        $this->pro_qty = $pro_quantity;
        $this->pro_color = $pro_color;
        $this->pro_size = $pro_size;
        $this->pro_price = $pro_price;
        $this->status = $status;
    }

    public function getId() {return $this->id;}
    public function getProId() {return $this->pro_id;}
    public function getProName() {return $this->pro_name;}
    public function getProQty() {return $this->pro_quatity;}
    public function getProColor() {return $this->pro_color;}
    public function getProSize() {return $this->pro_size;}
    public function getProPrice() {return $this->pro_price;}
    public function getStatus() {return $this->status;}
}
?>