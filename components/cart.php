<div class="col-lg-4 col-md-4 col-9 cart">
    <div class="cart-header">
        <div class="cart-title">
            <div class="content">Giỏ hàng</div>
            <div class="quantity"></div>
        </div>
        <i class="fa-solid fa-xmark cancel-icon"></i>
    </div>
    <div class="cart-products">
        <?php 
            include_once "cartProduct.php";
        ?>
    </div>
    <div class="cart-total">
        <div class="cart-total-title">Tổng cộng:</div>
        <div class="cart-total-money"></div>
    </div>
    <a href="../../views/cart/index.php" class="cart-btn-link">
        <div class="cart-btn-view">
            Xem giỏ hàng
        </div>
    </a>
</div>