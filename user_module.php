<?php 
    function register($link, $username, $password, $firstName, $lastName, $phoneNumber, $email, $gender) {
        chayTruyVanKhongTraVeDL($link, 'INSERT INTO users VALUES (NULL,
                                                                "'.mysqli_real_escape_string($link, $username).'",
                                                                "'.md5($password).'",
                                                                "'.$firstName.'",
                                                                "'.$lastName.'",
                                                                "'.$email.'",
                                                                "'.$phoneNumber.'",
                                                                "'.$gender.'",
                                                                "R1",
                                                                1,
                                                                )'
        );
    }
?>