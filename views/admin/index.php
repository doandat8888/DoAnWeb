<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a76b54ad15.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="./styles/manageProduct.css">
        <link rel="stylesheet" href="./styles/category.css">
        <link rel="stylesheet" href="./styles/home.css">
        <link rel="stylesheet" href="./styles/dashboard.css">
        
        
        <title>Admin page</title>
    </head>
    <body>
        <?php 
            include_once "../../controllers/productController.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 d-lg-block menu">
                    <div class="menu-logo">
                        <img src="../../src/img/logo.png" alt="">
                    </div>
                    
                    <div class="menu-list">
                        <div class="menu-item">
                            <a href="?page=dashboard" class="menu-item-link">
                                <span class="material-symbols-outlined">
                                    dashboard
                                </span>
                                <div class="content">Tổng quan</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="?page=category" class="menu-item-link">
                                <span class="material-symbols-outlined">
                                    inventory
                                </span>
                                <div class="content">Danh mục sản phẩm</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="?page=manage-product" class="menu-item-link">
                                <span class="material-symbols-outlined">
                                    inventory_2
                                </span>
                                <div class="content">Sản phẩm</div>
                            </a>
                        </div>
                        <!-- <div class="menu-item">
                            <a href="?page=manage-customer" class="menu-item-link">
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                                <div class="content">Khách hàng</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="?page=bill" class="menu-item-link">
                            <span class="material-symbols-outlined">
                                receipt_long
                            </span>
                                <div class="content">Đơn hàng</div>
                            </a>
                        </div> -->
                        <div class="menu-item">
                            <a href="?page=statistic" class="menu-item-link">
                            <span class="material-symbols-outlined">
                                signal_cellular_alt
                            </span>
                                <div class="content">Thống kê</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="../../index.php?msg=login-out" class="menu-item-link">
                                <span class="material-symbols-outlined">
                                    door_open
                                </span>
                                <div class="content">Đăng xuất</div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php 
                    include_once "pages.php";
                ?>
            </div>
        </div>
    </body>
    <script src="https://kit.fontawesome.com/644376ed9d.js" crossorigin="anonymous"></script>
    <script src="../search/script.js"></script>
    <script src="./script/home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</html>