<?php 
    function validateLenUp($up) {
        return strlen($up) >= 8 && strlen($up) <= 30;
    }

    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) != false ? true : false;
    }

    function existsUsername($link, $username) {
        $result = chayTruyVanTraVeDL($link, "select count(*) from users where username='".$username."'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0] > 0;
    }
    function existsCategoryProduct($link, $categoryname) {
        $result = chayTruyVanTraVeDL($link, "select count(*) from categories where name='".$categoryname."'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0] > 0;
    }
?>