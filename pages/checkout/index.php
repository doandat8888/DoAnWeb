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

            <div class="checkout-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 checkout-body-left">
                        <div class="checkout-info">
                            <div class="checkout-info-title">
                                Thông tin giao hàng
                            </div>
                            <div class="checkout-info-input">
                                <input type="text" class="checkout-info-input-item" placeholder="* Họ và tên">
                                <input type="text" class="checkout-info-input-item" placeholder="* Email">
                                <input type="text" class="checkout-info-input-item" placeholder="* Số điện thoại">
                                <input type="text" class="checkout-info-input-item" placeholder="* Địa chỉ">
                                <div class="checkout-info-input-txt">
                                    * là trường không được để trống
                                </div>
                            </div>
                        </div>
        
                        <div class="checkout-payment">
                            <div class="checkout-payment-title">
                                Phương thức thanh toán
                            </div>
                            <div class="checkout-payment-input">
                                <div class="checkout-payment-input-item">
                                    <input type="radio" name="checkout-method">
                                    <span class="material-symbols-outlined checkout-payment-input-item-icon">
                                        credit_card
                                    </span>
                                    <div class="checkout-payment-input-item-txt">Thanh toán thẻ (ATM, Visa, Mastercard)</div>
                                </div>
                                <div class="checkout-payment-input-item">
                                    <input type="radio" name="checkout-method">
                                    <span class="material-symbols-outlined checkout-payment-input-item-icon">
                                        shopping_bag
                                    </span>
                                    <div class="checkout-payment-input-item-txt">Thanh toán bằng ví Shopee Pay</div>
                                </div>
                                <div class="checkout-payment-input-item">
                                    <input type="radio" name="checkout-method">
                                    <span class="material-symbols-outlined checkout-payment-input-item-icon">
                                        local_shipping
                                    </span>
                                    <div class="checkout-payment-input-item-txt">Thanh toán ngay khi nhận hàng (COD)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 checkout-body-right">
                        <div class="cart-products checkout-products">
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
                        <div class="checkout-confirm">
                            <div class="checkout-confirm-title">
                                Thông tin giỏ hàng
                            </div>
                            <div class="checkout-confirm-list">
                                <div class="checkout-confirm-item">
                                    <div class="checkout-confirm-item-left">Tổng tiền hàng</div>
                                    <div class="checkout-confirm-item-right checkout-sum"></div>
                                </div>
                                <div class="checkout-confirm-item">
                                    <div class="checkout-confirm-item-left">Phí ship</div>
                                    <div class="checkout-confirm-item-right checkout-ship">20.000đ</div>
                                </div>
                                <div class="checkout-confirm-item">
                                    <div class="checkout-confirm-item-left">Thành tiền</div>
                                    <div class="checkout-confirm-item-right checkout-total"></div>
                                </div>
                            </div>
                            <div class="checkout-confirm-btn">
                                Hoàn tất đơn hàng
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    include_once "../../components/footer.php";
                ?>
            </div>
            
        </div>
        
    </body>
    <script src="https://kit.fontawesome.com/644376ed9d.js" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
    
</html>