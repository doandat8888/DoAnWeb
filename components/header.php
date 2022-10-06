<div class="search-section d-flex justify-content-center align-items-center">
    <form class="search-form" action="../views/search/index.php" method="get">
        <input name="searchstr" type="text" placeholder="TÌM KIẾM SẢN PHẨM" class="search-input">
        <input type="submit" class="search-link" style="color:none!important;">
    </form>  
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
        <li class="category-item">Trẻ em</li>
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
                <li class="nav-item">Trẻ em</li>
            </ul>
        </div>
       
        <div class="nav-icon">
            <?php 
                // include "./controllers/userController.php";
                // $controler = new UserController();
                // if(isset($_SESSION['role'])) {
                //     if($_SESSION['role'] === 'R1') {
                //         $username = $_SESSION['username'];
                //         $password = $_SESSION['password'];
                //         $data = $controler->getInfoUser($username, $password);
                //         foreach($data as $user) {
                //             echo "<div class='user-info'>".$user->getFirstName()." ".$user->getLastName()."</div>
                //                 <a href='../../index.php?msg=login-out' class='header-icon'>
                //                     <span class='material-symbols-outlined'>
                //                         door_open
                //                     </span>
                //                 </a>
                //             ";
                //         }
                //     }
                // }else {
                //     echo '<a href="../../views/login/index.php" class="header-icon user-icon">
                //         <span class="material-symbols-outlined">
                //             person
                //         </span>
                //     </a>'
                //     ;
                // }
                
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