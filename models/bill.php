<?php
    class Bill{
        private $id;
        private $cus_firstName;
        private $cus_lastName;
        private $email;
        private $phoneNumber;
        private $total;
        private $address;
        private $status;

        public function getId() {return $this->id;}
        public function getFirstName() {return $this->cus_firstName;}
        public function getLastName() {return $this->cus_lastName;}
        public function getEmail() {return $this->email;}
        public function getPhoneNumber() {return $this->phoneNumber;}
        public function getTotal() {return $this->total;}
        public function getAddress() {return $this->address;}
        public function getStatus() {return $this->status;}

        public function __construct($id, $cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address, $status)
        {
            $this->id = $id;
            $this->cus_firstName = $cus_firstName;
            $this->cus_lastName = $cus_lastName;
            $this->email = $email; 
            $this->phoneNumber = $phoneNumber;
            $this->total = $total;
            $this->address = $address;
            $this->status = $status;
        }
    }
?>