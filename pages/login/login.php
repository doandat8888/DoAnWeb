<?php 
    include_once "../../db_module.php";
    $link = NULL;
    taoKetNoi($link);
    $result = NULL;
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $result = chayTruyVanTraVeDL($link, "select * from users where username like '%".$_POST['username']."%' and password like '%".$_POST['password']."%'");
        $rows= mysqli_fetch_row($result);
        if($rows[0] > 0) {
            $rows1 = mysqli_fetch_object($result);
            echo $rows1;
            echo "Đăng nhập thành công";
            $_SESSION['firstName'] = $rows1->firstName;
            $_SESSION['lastName'] = $rows1->lastName; 
            header("Location: ../admin/");
        }else{
            header('Location: ../../pages/login/index.php?msg=login-fail');
        }
    }else {
        echo "<p style='color:red; font-size: 12px'>Vui lòng nhập đủ thông tin</p>";
    }
?>