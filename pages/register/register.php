<?php 
    include_once "../../db_module.php";
    require_once "../../validate_module.php";
    require_once "../../user_module.php";
    $link = NULL;
    taoKetNoi($link);
    $result = NULL;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $count = 0;
    $registerInfo = ['username', 'password', 'firstName', 'lastName', 'phoneNumber', 'email', 'gender'];
    for($i = 0; $i < count($registerInfo); $i++) {
        if($_POST[$registerInfo[$i]] == '') {
            header('Location: ../../pages/register/index.php?msg=missing-info');
            break;
        }else {
            $count++;
        }
    }
    if($count == count($registerInfo)) {
        // register($link, $username, $password, $firstName, $lastName, $phoneNumber, $email, $gender);
        // giaiPhongBoNho($link, true);
        // echo "Đăng kí thành công";
        // if(validateLenUp($username) == true 
        // && validateLenUp($password) == true) {
        //     if(validateEmail($email) == true) {
        //         if(existsUsername($link, $username) == true) {
        //             header('Location: ../../pages/register/index.php?msg=username-existed');
        //         }else {
        //             register($link, $username, $password, $firstName, $lastName, $phoneNumber, $email, $gender);
        //             giaiPhongBoNho($link, true);
        //             echo "Đăng kí thành công";
                    
        //         }
        //     }
        // }
        // $valid = false;
        // $valid = $valid && validateLenUp($username);
        // $valid = $valid && validateLenUp($password);
        // $valid = $valid && validateEmail($email);
        // if($valid) {
        //     if(existsUsername($link, $username)) {
        //         giaiPhongBoNho($link, true);
        //         header('Location: ../../pages/register/index.php?msg=username-existed');
        //     }else {
        //         register($link, $username, $password, $firstName, $lastName, $phoneNumber, $email, $gender);
        //         giaiPhongBoNho($link, true);
        //         header('Location: ../../pages/register/index.php?msg=done');
        //     }
        // }else {
        //     echo "Thông tin dăng ký không hợp lệ";
        // }
        register($link, $username, $password, $firstName, $lastName, $phoneNumber, $email, $gender);
        giaiPhongBoNho($link, true);
        header('Location: ../../pages/register/index.php?msg=done');
    }
?>