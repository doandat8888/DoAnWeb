<?php 
    // session_start();
    include_once "../../modules/db_module.php";
    include_once "../../models/user.php";
    include_once "../../validate_module.php";
    class UserModel {
        public function getUser($username, $password) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from users WHERE `username` = '$username' AND `password` = '".md5($password)."'";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $_SESSION['firstName'] = $rows['firstName'];
                    $_SESSION['lastName'] = $rows['lastName'];
                    $_SESSION['role'] = $rows['role'];
                    $_SESSION['image'] = $rows['image'];
                    $user = new User($rows["id"], $rows["username"], $rows["password"], 
                    $rows["firstName"], $rows["lastName"], $rows["email"], 
                    $rows["phoneNumber"], $rows["gender"], $rows["image"], 
                    $rows["role"]);
                    array_push($data, $user);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
        public function setUser($firstName, $lastName, $phoneNumber, $email, $username, $password, $gender) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            if(existsUsername($link, $username)) {
                giaiPhongBoNho($link, true);
                $result = false;
            }else {
                $password = md5($password);
                $username = mysqli_real_escape_string($link, $username);
                $query = "INSERT INTO `users` (`username`, `password`, `firstName`, `lastName`, `email`, 
                `phoneNumber`, `gender`, `role`) 
                VALUES ('$username', '$password', '$firstName', '$lastName', 
                '$email', '$phoneNumber', '$gender', 'R1')";
                $setuser = chayTruyVanKhongTraVeDL($link, $query);
                if($setuser) {
                    $result = true;
                }
            }
            return $result;
        }   
    }
?>
