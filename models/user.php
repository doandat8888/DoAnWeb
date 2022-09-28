<?php 
    class User {
        private $id;
        private $username;
        private $password;
        private $firstName;
        private $lastName;
        private $email;
        private $phoneNumber;
        private $gender;
        private $image;
        private $role;

        public function __construct($id, $username, $password, $firstName, $lastName, $email, $phoneNumber, $gender, $image, $role) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->gender = $gender;
            $this->image = $image;
            $this->role = $role;
        }

        public function getId() {return $this->id;}
        public function getUsername() {return $this->username;}
        public function getPassword() {return $this->password;}
        public function getFirstName() {return $this->firstName;}
        public function getLastname() {return $this->lastName;}
        public function getEmail() {return $this->email;}
        public function getPhonenumber() {return $this->phoneNumber;}
        public function getGender() {return $this->gender;}
        public function getImage() {return $this->image;}
        public function getRole() {return $this->role;}

        public function __toString()
        {
            return "User($this->id, $this->username, $this->password, $this->firstName, $this->lastName, $this->email, $this->phoneNumber, $this->gender, $this->image, $this->role)";
        }
    }
?>