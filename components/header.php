<div class="search-section d-flex justify-content-center align-items-center">
    <input type="text" placeholder="TÌM KIẾM SẢN PHẨM" class="search-input">
    <a href="../pages/search/index.php" class="search-link" style="color: none !important;">
        <span class="material-symbols-outlined header-icon search-icon-1">
            search
        </span>
    </a>

    <i class="fa-solid fa-xmark cancel-icon"></i>
</div>
<div class="category">
    <i class="fa-solid fa-xmark cancel-icon"></i>
    <br>
    <a href="./pages/login/index.php">
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
            <a href="../../index.php"><img src="../../src/img/logo.png" class="image" /></a>
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
            <?php 
                session_start();
                if(isset($_SESSION['role'])) {
                    if($_SESSION['role'] === 'R1') {
                        if(isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
                            $firstName = $_SESSION['firstName'];
                            $lastName = $_SESSION['lastName'];
                            echo "<span class='user-info'>$firstName $lastName</span>";
                        }
                    }
                }else {
                    echo '<a href="./pages/login/index.php" class="header-icon user-icon">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                    </a>';
                }
            ?>
            <div class="header-icon">
                <span class="material-symbols-outlined cart-icon">
                    shopping_cart
                </span>
                <span class="cart-number"></span>
            </div>
            <span class="material-symbols-outlined header-icon search-icon">
                search
            </span>
           
        </div>
        <?php
            include_once "cart.php";
        ?>
    </div>
</div>