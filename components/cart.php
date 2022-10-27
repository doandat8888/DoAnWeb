<div class="col-lg-4 col-md-4 col-9 cart">
    <div class="cart-header">
        <div class="cart-title">
            <div class="content">Giỏ hàng</div>
            <div class="quantity"></div>
        </div>
        <i class="fa-solid fa-xmark cancel-icon"></i>
    </div>
    <?php if(isset($_SESSION['cart'])) {
            if(sizeof($_SESSION['cart'])>0) {?>
                <div class="cart-products ">
                <?php 
                    include_once "cartProduct.php";
                ?>
                </div>
            <?php } else {?>
                <div class="cart-products overflow-hidden">
                <?php 
                    include_once "cartProduct.php";
                ?>
                </div>
            <?php } ?>
        <?php } else {?>
            <div class="cart-products overflow-hidden">
                <?php 
                    include_once "cartProduct.php";
                ?>
                </div>
            <?php } ?>
    <div class="cart-total">
        <div class="cart-total-title">Tổng cộng:</div>
        <div class="cart-total-money"></div>
    </div>
    <a href="../views/cart/index.php" class="cart-btn-link">
        <div class="cart-btn-view">
            Xem giỏ hàng
        </div>
    </a>
</div>