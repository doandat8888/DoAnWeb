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
            <div class="search-section d-flex justify-content-center align-items-center">
                <input type="text" placeholder="TÌM KIẾM SẢN PHẨM" class="search-input">
                <a href="../../pages/search/index.php" class="search-link" style="color: none !important;">
                    <span class="material-symbols-outlined header-icon search-icon-1">
                        search
                    </span>
                </a>
                
                <i class="fa-solid fa-xmark cancel-icon"></i>
            </div>
            <div class="category">
                <i class="fa-solid fa-xmark cancel-icon"></i>
                <br>
                <a href="./index.php">
                    <button class="login-btn">
                        Đăng nhập
                    </button>
                </a>
                <ul class="category-list">
                    <li class="category-item">Trang chủ</li>
                    <li class="category-item">Sản phẩm</li>
                    <li class="category-item">Nam</li>
                    <li class="category-item">Nữ</li>
                    <li class="category-item">Liên hệ</li>
                </ul>
            </div>
            
            
            
            <div id="header">
                <div class="container">
                    <div class="logo">
                        <a href="../../index.php"><img src="../../src/img/logo.png" class="image"/></a>
                    </div>
                    <div id="navigation-bar">
                        <span class="material-symbols-outlined bar-icon">
                            menu
                        </span>
                    </div>
                    <div class="list d-md-none d-lg-flex align-items-center justify-content-center">
                        <ul class="nav-list hide-on-mobile-tablet">
                            <li class="nav-item">Trang chủ</li>
                            <li class="nav-item">Sản phẩm</li>
                            <li class="nav-item">Nam</li>
                            <li class="nav-item">Nữ</li>
                            <li class="nav-item">Liên hệ</li>
                        </ul>
                    </div>                     
                    <div class="nav-icon">
                        <span class="material-symbols-outlined header-icon search-icon">
                            search
                        </span>
                        <div class="header-icon">
                            <span class="material-symbols-outlined cart-icon">
                                shopping_cart
                            </span>
                            <span class="cart-number"></span>
                        </div>
                        <span class="material-symbols-outlined header-icon user-icon">
                            person
                        </span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-9 cart">
                        <div class="cart-header">
                            <div class="cart-title">
                                <div class="content">Giỏ hàng</div>
                                <div class="quantity"></div>
                            </div>
                            <i class="fa-solid fa-xmark cancel-icon"></i>
                        </div>
                        <div class="cart-products">
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
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart-total">
                            <div class="cart-total-title">Tổng cộng:</div>
                            <div class="cart-total-money"></div>
                        </div>
                        <a href="../../pages/cart/index.php" class="cart-btn-link">
                            <div class="cart-btn-view">
                                Xem giỏ hàng
                            </div>
                        </a>
                        
                    </div>
                </div>            
            </div>

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