<nav class ="row d-sm-none d-md-block" aria-label ="breadcrumb">
    <ol class ="breadcrumb">
        <?php
            switch (basename($_SERVER['PHP_SELF'])) {
                case 'index.php':
                    echo '<li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li> / </li>
                            <li>Sản phẩm</li>';
                    break;
                case 'indexpd.php':
                    echo '<li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li> / </li>
                            <li class="breadcrumb-item"><a href="../views/detailProduct/indexpd.php" class="breadcrumb-item-link">Sản phẩm</a></li>';
                            //chưa lấy được tên sản phẩm gắn vào breadcrumb        
                    break;
                case 'indexcart.php':
                    echo '<li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li> / </li>
                            <li>Giỏ hàng</li>';
                    break;
                case 'indexcheckout.php':
                    echo '<li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li> / </li>
                            <li class="breadcrumb-item"><a href="../views/cart/indexcart.php" class="breadcrumb-item-link">Giỏ hàng</a></li>
                            <li> / </li>
                            <li>Checkout</li>';
                    break;
                case 'indexsearch.php':
                    echo '<li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li> / </li>
                            <li>Tìm kiếm</li>';
                    break;
                default:
                    echo '<li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-item-link">Trang chủ</a></li>';
                    break;
            }
        ?>
    </ol>
</nav>