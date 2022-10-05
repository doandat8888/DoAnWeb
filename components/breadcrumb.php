<nav class ="row d-sm-none d-md-block" aria-label ="breadcrumb">
    <ol class ="breadcrumb">
        <?php
            switch (basename($_SERVER['PHP_SELF'])) {
                case 'index.php':
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li>/</li>
                            <li>Sản phẩm</li>';
                    break;
                case 'detailProduct.php':
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li>/</li>
                            <li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Sản phẩm</a></li>
                            <li>'.ucwords($selecPro["name"]).'</li>';
                    break;
                case 'cart.php':
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li>/</li>
                            <li>Giỏ hàng</li>';
                    break;
                case 'checkout.php':
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li>/</li>
                            <li class="breadcrumb-item"><a href="../../cart.php" class="breadcrumb-item-link">Giỏ hàng</a></li>
                            <li>/</li>
                            <li>Checkout</li>';
                    break;
                case 'search.php':
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li>/</li>
                            <li>Tìm kiếm</li>';
                    break;
                default:
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>';
                    break;
            }
        ?>
        <li class="breadcrumb-item">
            <a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a>
        </li>
    </ol>
</nav>