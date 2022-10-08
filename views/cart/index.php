<?php
    session_start();
?>
<?
    include_once "../../modules/db_module.php";
    include_once "../../validate_module.php";
    include_once "../../controllers/userController.php";
    include_once "../../controllers/productController.php";

    // if(isset($_SESSION['role']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
    //     if(isset($_POST['scope'])) {
    //         $scope = $_POST['scope'];
    //         switch($scope) {
    //             case "add":
    //                 $prod_id = $_POST['pro_id'];
    //                 $prod_size = $_POST['pro_size'];
    //                 $prod_color = $_POST['pro_color'];
    //                 $prod_qty = $_POST['pro-quantity'];

    //                 $user_id = $_SESSION['username']['id'];
    //                 //thêm database Cart
    //                 break;
    //             default:
    //                 echo 500;
    //         }
    //     }
    // }
?>

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

            <div class="cart-body">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12 cart-info">
                        <div class="cart-info-content">
                            <p class="cart-info-txt"></p>
                            <div class="cart-info-content-price">
                                <p class="cart-info-content-price-txt">Thành tiền</p>
                                <p class="cart-info-content-price-money"></p>
                            </div>
                        </div>
                        <div class="cart-info-btn">
                            <a href="../checkout/index.php" class="cart-btn-link">
                                <div class="cart-btn-view">
                                    Đặt hàng
                                </div>
                            </a>
                            <a href="../../index.php" class="cart-btn-link">
                                <div class="cart-btn-view">
                                    Về trang chủ
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-12 cart-products">
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-3">
                                    <img src="../../src/img/products/women/product-women-6-1.jpg" class="cart-item-img" alt="">
                                </div>
                                <div class="col-9">
                                    <div class="cart-item-name">
                                        Đầm Cut Out Đính Ngọc Trai
                                    </div>
                                    <div class="cart-item-color-size">
                                        <div class="color">
                                            Màu sắc: Trắng
                                        </div>
                                        <div class="size">
                                            Size: S
                                        </div>
                                    </div>
                                    <div class="cart-item-quantity-price">
                                        <div class="cart-item-quantity">
                                            <div class="cart-item-quantity-minus">
                                                <span class="material-symbols-outlined minus-icon">
                                                    remove
                                                </span>
                                            </div>
                                            <input type='text' value='1' min='0' max='10' class='cart-item-quantity-input'>
                                            <div class="cart-item-quantity-plus">
                                                <span class="material-symbols-outlined plus-icon">
                                                    add
                                                </span>
                                            </div>
                                        </div>
                                        <div class="cart-item-price">950.000đ</div>
                                        <span class="material-symbols-outlined del-icon">
                                            delete
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-3">
                                    <img src="../../src/img/products/women/product-women-7-1.jpg" class="cart-item-img" alt="">
                                </div>
                                <div class="col-9">
                                    <div class="cart-item-name">
                                        Set Áo Và Chân Váy Họa Tiết Kẻ
                                    </div>
                                    <div class="cart-item-color-size">
                                        <div class="color">
                                            Màu sắc: Xanh
                                        </div>
                                        <div class="size">
                                            Size: XL
                                        </div>
                                    </div>
                                    <div class="cart-item-quantity-price">
                                        <div class="cart-item-quantity">
                                            <div class="cart-item-quantity-minus">
                                                <span class="material-symbols-outlined minus-icon">
                                                    remove
                                                </span>
                                            </div>
                                            <input type='text' value='1' min='0' max='10' class='cart-item-quantity-input'>
                                            <div class="cart-item-quantity-plus">
                                                <span class="material-symbols-outlined plus-icon">
                                                    add
                                                </span>
                                            </div>
                                        </div>
                                        <div class="cart-item-price">750.000đ</div>
                                        <span class="material-symbols-outlined del-icon">
                                            delete
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-3">
                                    <img src="../../src/img/products/women/product-women-5-1.jpg" class="cart-item-img" alt="">
                                </div>
                                <div class="col-9">
                                    <div class="cart-item-name">
                                        Set Áo Blazer Và Quần Suông Dài
                                    </div>
                                    <div class="cart-item-color-size">
                                        <div class="color">
                                            Màu sắc: Vàng Cam
                                        </div>
                                        <div class="size">
                                            Size: X
                                        </div>
                                    </div>
                                    <div class="cart-item-quantity-price">
                                        <div class="cart-item-quantity">
                                            <div class="cart-item-quantity-minus">
                                                <span class="material-symbols-outlined minus-icon">
                                                    remove
                                                </span>
                                            </div>
                                            <input type='text' value='2' min='0' max='10' class='cart-item-quantity-input'>
                                            <div class="cart-item-quantity-plus">
                                                <span class="material-symbols-outlined plus-icon">
                                                    add
                                                </span>
                                            </div>
                                        </div>
                                        <div class="cart-item-price">1.250.000đ</div>
                                        <span class="material-symbols-outlined del-icon">
                                            delete
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once "../../components/footer.php"?>
            </div>

            <?php include_once "../../components/scrollToTop.php"?>
        </div>      
    </body>
    <script src="./script.js"></script>
    <script src="./pages/deatailProduct/script.js"></script>
    <script src="https://kit.fontawesome.com/644376ed9d.js" crossorigin="anonymous"></script>
</html>