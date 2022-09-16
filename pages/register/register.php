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
    //if($count == count($registerInfo)) {
        // if(validateLenUp($username) == true 
        // && validateLenUp($password) == true) {
        //     if(validateEmail($email) == true) {
        //         if(existsUsername($link, $username) == true) {
        //             header('Location: ../../pages/register/index.php?msg=username-existed');
        //         }else {
                    register($link, $username, $password, $firstName, $lastName, $phoneNumber, $email, $gender);
                    echo "Đăng kí thành công";
        //         }
        //     }
        // }
    //}
?>