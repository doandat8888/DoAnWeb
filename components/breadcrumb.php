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
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li>/</li>
                            <li class="breadcrumb-item"><a href="../../views/search/indexsearch.php" class="breadcrumb-item-link">Sản phẩm</a></li>
                            <li>/</li>';
                            include_once "../../controllers/productController.php";
                            $controller = new ProductController();
                            if(isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $data = $controller->getProductById($id);
                                foreach ($data as $product) {
                                    echo ' <li class="breadcrumb-item active" aria-current="page">'.$product->getName().'</li>';
                                }
                            }        
                    break;
                case 'indexcart.php':
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li> / </li>
                            <li>Giỏ hàng</li>';
                    break;
                case 'indexcheckout.php':
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
                            <li> / </li>
                            <li class="breadcrumb-item"><a href="../../views/cart/indexcart.php" class="breadcrumb-item-link">Giỏ hàng</a></li>
                            <li> / </li>
                            <li>Checkout</li>';
                    break;
                case 'indexsearch.php':
                    echo '<li class="breadcrumb-item"><a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a></li>
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