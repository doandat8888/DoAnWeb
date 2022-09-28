<?php 
    class Admin {
        private $id;
        private $username;
        private $password;
        private $firstName;
        private $lastName;
        private $image;

        public function __construct($id, $username, $password, $firstName, $lastName, $image) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->image = $image;
        }

        public function getId() {return $this->id;}
        public function getUsername() {return $this->username;}
        public function getPassword() {return $this->password;}
        public function getFirstName() {return $this->firstName;}
        public function getLastname() {return $this->lastName;}
        public function getImage() {return $this->image;}

        public function __toString()
        {
            return "User($this->id, $this->username, $this->password, $this->firstName, $this->lastName, $this->image)";
        }
    }
?>