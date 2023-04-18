<?php session_start()?>
<div class="search-section d-flex justify-content-center align-items-center">
    <form class="search-form col-12 col-sm-10 col-lg-12" action="../../views/search/index.php" method="get">
        <input name="searchstr" type="text" placeholder="TÌM KIẾM SẢN PHẨM" class="search-input">
        <input type="submit" class="search-link btn btn-dark btn-lg" style="color:none!important;" value="Tìm kiếm">
    </form> 

    <?php 
        if(isset($_GET['searchstr'])){
            $_SESSION['search'] = $_GET['searchstr'];
        }
    ?>

    <?php
        if(isset($message)) {
            if($message === 'login-out') {
                if(isset($_SESSION['role']) && isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
                    unset($_SESSION['role']);
                    unset($_SESSION['firstName']);
                    unset($_SESSION['lastName']);
                }
            }
        }
        if(isset($id)) {
            if($id != ''){
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    for ($i = 0; $i < count($cart); $i++) {
                        unset($cart[$id]);
                    }
                    $_SESSION['cart'] = $cart;
                    $prod_price_total = 0;
                    foreach ($_SESSION['cart'] as $value) {
                        $prod_price_total += $value['prod_price_total'];
                    }
                    $_SESSION['prod_price_total'] = $prod_price_total;
                }
            }
        }
    ?>

    <!-- <a href="../../views/search/index.php" class="search-link" style="color: none !important;"> -->
        <!-- <span class="material-symbols-outlined header-icon search-icon-1">
            search
        </span>
    </a> -->

    <i class="fa-solid fa-xmark cancel-icon"></i>
</div>
<div class="category">
    <i class="fa-solid fa-xmark cancel-icon"></i>
    <br>
    <a href="../../views/login/index.php">
        <button class="login-btn">
            Đăng nhập
        </button>
    </a>
    <ul class="category-list">
        <li class="category-item">
            <a href="../../index.php" class="nav-item-link">
                Trang chủ
            </a>
        </li>
        <li class="category-item">
            <a href="../../views/product/index.php" class="nav-item-link">
                Sản phẩm
            </a>
        </li>
        <li class="category-item">
            <a href="../../views/product/index.php?type=0" class="nav-item-link">
                Nam
            </a>
        </li>
        <li class="category-item">
            <a href="../../views/product/index.php?type=1" class="nav-item-link">
                Nữ
            </a>
        </li>
        <li class="category-item">
            <a href="../../views/product/index.php?type=2" class="nav-item-link">
                Trẻ em
            </a>
        </li>
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
                <li class="nav-item">
                    <a href="../../index.php" class="nav-item-link">
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../views/product/index.php" class="nav-item-link">
                        Sản phẩm
                    </a>
                </li>
                <?php
                    $filepath = realpath(dirname(__FILE__));
                    include_once ($filepath. '/../controllers/typeController.php'); 
                    $typeController = new TypeController();
                    $typeController->getTypeListProduct();
                ?>
                <li class="nav-item">
                    <a href="../../views/product/index.php" class="nav-item-link">
                        Kênh người bán
                    </a>
                </li>
            </ul>
            
        </div>
       
        <div class="nav-icon">
            <?php 
                if(isset($_SESSION['role'])) {
                    if($_SESSION['role'] === 'R1') {
                        if(isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
                            $firstName = $_SESSION['firstName'];
                            $lastName = $_SESSION['lastName'];
                            echo "<div class='user-info'>$firstName $lastName</div>
                                <a href='../../index.php?msg=login-out' class='header-icon'>
                                    <span class='material-symbols-outlined'>
                                        door_open
                                    </span>
                                </a>
                            ";
                        }
                    }else {
                        echo '<a href="../../views/login/index.php" class="header-icon user-icon">
                            <span class="material-symbols-outlined">
                                person
                            </span>
                        </a>'
                        ;
                    }
                }else {
                    echo '<a href="../../views/login/index.php" class="header-icon user-icon">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                    </a>'
                    ;
                }
            ?>

            <div class="header-icon cart-icon">
                <span class="material-symbols-outlined">
                    shopping_cart
                </span>
                <?php
                    if(isset($_SESSION['cart'])) {
                        $totalQuantity = 0;
                        foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
                        <?php
                            $totalQuantity += $prod_quantity;
                        ?>
                        <?php
                        endforeach;
                        if(sizeof($_SESSION['cart'])>0) {
                            echo'
                            <span class="cart-number">'.$totalQuantity.'</span>';
                        }else {
                            echo'
                            <span class="cart-number">0</span>';
                        }
                    } else {
                        echo'
                        <span class="cart-number">0</span>';
                    }
                    
                ?>
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