<?php 
    session_start();
    include_once "../../db_module.php";
    $link = NULL;
    taoKetNoi($link);
    $result = NULL;
    if($_POST['username'] != '' && $_POST['password'] != '') {
        $result = chayTruyVanTraVeDL($link, "select * from users where username like '%".$_POST['username']."%' and password like '%".md5($_POST['password'])."%'");
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                $_SESSION['role'] = $row['role'];
            }
            if(isset($_SESSION['role'])) {
                $role = $_SESSION['role'];
                if($role === 'R1') {
                    header("Location: ../../index.php");
                }else if($role === 'R2') {
                    header("Location: ../admin/");
                }
            }
        }else{
            header('Location: ../../pages/login/index.php?msg=login-fail');
        }
    }else {
        header('Location: ../../pages/login/index.php?msg=missing-info');
    }
?>