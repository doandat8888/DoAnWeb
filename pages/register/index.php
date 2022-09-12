<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./pages/detailProduct/stylespd.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <title>Home</title>
    </head>
    <body>
        <div class="container">
            <?php 
                include_once "../../components/header.php";
            ?>

            <div class="login-body row">
                <div class="col-sm-8 col-md-6 col-lg-4 col-12 login-form">
                    <div class="login-form-logo">
                        <img src="../../src/img/logo.png" class="login-logo-img">
                    </div>
                    <div class="login-form-body">
                        <div class="login-form-input">
                            <input type="text" class="login-form-input-item" placeholder="Họ">
                            <input type="text" class="login-form-input-item" placeholder="Tên">
                            <input type="text" class="login-form-input-item" placeholder="SĐT">
                            <input type="text" class="login-form-input-item" placeholder="Email">
                            <input type="text" class="login-form-input-item col-12" placeholder="Tên đăng nhập">
                            <input type="text" class="login-form-input-item col-12" placeholder="Mật khẩu">
                        </div>
                        <div class="login-form-btn">
                            Đăng ký
                        </div>
                        <div class="login-form-sign-up">
                            Bạn đã có tài khoản? <a href="../login/index.php" class="login-form-sign-up-link">Đăng nhập</a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </body>
    <script src="https://kit.fontawesome.com/644376ed9d.js" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
    
</html>