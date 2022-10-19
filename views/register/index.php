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
        <title>Đăng ký tài khoản</title>
    </head>
    <body>
        <div class="container">
            <?php 
                include_once "../../controllers/userController.php";
                if (isset($_POST['submit'])) {
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $phoneNumber = $_POST['phoneNumber'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $gender = $_POST['gender'];
                    $controller = new UserController();
                    $controller->setUser($firstName, $lastName, $phoneNumber, $email, $username, $password, $gender);
                }

                if(isset($_POST['go-to-home'])) {
                    header('Location: ../../index.php');
                }
            ?>

            <div class="register-body row">
                <form class="col-sm-8 col-md-6 col-lg-4 col-12 register-form" method="post" action="./index.php">
                    <div class="register-form-logo">
                        <img src="../../src/img/logo.png" class="register-logo-img">
                    </div>
                    <div class="register-form-body">
                        <div class="register-form-input">
                            <input type="text" class="register-form-input-item" placeholder="Họ" name="firstName">
                            <input type="text" class="register-form-input-item" placeholder="Tên" name="lastName">
                            <input type="text" class="register-form-input-item" placeholder="SĐT" name="phoneNumber">
                            <input type="text" class="register-form-input-item" placeholder="Email" name="email">
                            <input type="text" class="register-form-input-item col-12" placeholder="Tên đăng nhập" name="username">
                            <input type="password" class="register-form-input-item col-12" placeholder="Mật khẩu" name="password">
                            <select class="register-form-input-item col-12" placeholder="Giới tính" name="gender">
                                <option value="">Giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                            <?php 
                                if(isset($_GET['msg'])) {
                                    if($_GET['msg'] === 'missing-info') {
                                        echo "<span style='margin-bottom: 40px; color: red; font-size: 12px;'>Vui lòng nhập đủ thông tin</span>";
                                    }else if($_GET['msg'] === 'username-existed') {
                                        echo "<span style='margin-bottom: 40px; color: red; font-size: 12px;'>Tài khoản đã tồn tại trong hệ thống</span>";
                                    }else if($_GET['msg'] === 'done') {
                                        echo "<span style='margin-bottom: 40px; color: green; font-size: 12px;'>Đăng kí thành công</span>";
                                    }
                                }
                            ?>
                        </div>
                        <button class="register-form-btn" type="submit" name="submit">
                            Đăng ký
                        </button>
                        <button class="register-form-btn go-to-home" name="go-to-home" type="submit">
                            Về trang chủ
                        </button>
                        <div class="register-form-sign-up">
                            Bạn đã có tài khoản? <a href="../login/index.php" class="register-form-sign-up-link">Đăng nhập</a>
                        </div>
                    </div>
                </form>
                
            </div>
            
        </div>
        
    </body>
    <script src="https://kit.fontawesome.com/644376ed9d.js" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
    
</html>