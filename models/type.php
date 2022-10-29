<?php
    class Type {
        private $id;
        private $name;
        private $status;
        
        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getStatus() {return $this->status;}

        public function __construct($id, $name, $status) {
            $this->id = $id;
            $this->name = $name;
            $this->status = $status;
        }

        public function __toString()
        {
            return "Type($this->id, $this->name, $this->status)";
        }
    }
?>