<?php 
    include_once "../../db_module.php";
    $link = NULL;
    taoKetNoi($link);
    $result = NULL;
    if($_POST['username'] != '' && $_POST['password'] != '') {
        $result = chayTruyVanTraVeDL($link, "select * from users where username like '%".$_POST['username']."%' and password like '%".$_POST['password']."%'");
        $rows= mysqli_fetch_row($result);
        if($rows[0] > 0) {
            header("Location: ../admin/");
        }else{
            header('Location: ../../pages/login/index.php?msg=login-fail');
        }
    }else {
        header('Location: ../../pages/login/index.php?msg=missing-info');
    }
?>