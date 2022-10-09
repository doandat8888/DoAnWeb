<?php
class Bill {
    private $id;
    private $customer_id;
    private $total;
    private $address;
    private $status;
    
    public function __construct($id, $customer_id, $total, $address, $status) {
        $this->id = $id;
        $this->$customer_id = $customer_id;
        $this->$total = $total;
        $this->$address = $address;
        $this->status = $status;
    }

    public function getId() {return $this->id;}
    public function getCustomerId() {return $this->customer_id;}
    public function getTotal() {return $this->total;}
    public function getAddress() {return $this->address;}
    public function getStatus() {return $this->status;}
}
?>