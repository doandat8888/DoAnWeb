<?php 
    // session_start();
    include_once "../modules/db_module.php";
    include_once "../models/admin.php";
    class AdminModel {
        public function login() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $username = $_POST['username'];
            $password = $_POST['password'];
            // if($_POST['username'] != '' && $_POST['password'] != '') {
                $query = "SELECT * from admins WHERE `username` = '$username' AND `password` = '".md5($password)."'";
                $result = chayTruyVanTraVeDL($link, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($rows = mysqli_fetch_assoc($result)) {
                        $_SESSION['username'] = $rows['username'];
                        $_SESSION['password'] = $rows['password'];
                        $_SESSION['firstName'] = $rows['firstName'];
                        $_SESSION['lastName'] = $rows['lastName'];
                        $_SESSION['image'] = $rows['image'];
                        $user = new Admin($rows["id"], $rows["username"], $rows["password"], $rows["firstName"], $rows["lastName"], $rows["image"]);
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

//Cái đống comment để cho vô controller
