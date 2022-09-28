<?php 
    // session_start();
    include_once "../../modules/db_module.php";
    include_once "../../models/user.php";
    class UserModel {
        public function getUser() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $username = $_POST['username'];
            $password = $_POST['password'];
            // if($_POST['username'] != '' && $_POST['password'] != '') {
                $query = "SELECT * from users WHERE `username` = '$username' AND `password` = '".md5($password)."'";
                $result = chayTruyVanTraVeDL($link, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($rows = mysqli_fetch_assoc($result)) {
                        $_SESSION['username'] = $rows['username'];
                        $_SESSION['password'] = $rows['password'];
                        $_SESSION['firstName'] = $rows['firstName'];
                        $_SESSION['lastName'] = $rows['lastName'];
                        $_SESSION['role'] = $rows['role'];
                        $_SESSION['image'] = $rows['image'];
                        $user = new User($rows["id"], $rows["username"], $rows["password"], $rows["firstName"], $rows["lastName"], $rows["email"], $rows["phoneNumber"], $rows["gender"], $rows["image"], $rows["role"]);
                        array_push($data, $user);
                    }
                    giaiPhongBoNho($link, $result);
                }else{
                    
                    $data = NULL;
                }
            // }else {
            //     header('Location: ../../pages/login/index.php?msg=missing-info');
            // }
            return $data;
        }
    }
?>
