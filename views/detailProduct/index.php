<?
    session_start();
    include_once "../../modules/db_module.php";
    include_once "../../validate_module.php";
    require_once "../../modules/cart_module.php";
?>

<!-- format đơn vị tiền tệ -->
<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>
<!-- format màu -->
<?php
if (!function_exists('color_format')) {
    function color_format($color) {
        $colorHex = "";
        $arraycolor = array(
            "blue" => "C6E9EC",
            "white" => "FFFFFF",
            "pink" => "FB6E7C",
            "orange" => "F3A45F",
            "yellow" => "F4ED95",
            "brown" => "C4B095",
            "red" => "EC3333",
            "black" => "212529",
            "green" => "98A882",
            "gray" => "A8A9AD",
        );
        while($element = current($arraycolor)) {
            if(key($arraycolor) == $color) {
                $colorHex = $arraycolor[key($arraycolor)];
            }
            next($arraycolor);
        }
            
        
        return $colorHex;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap v4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="../../public/CSS/basepd.css">
    <link rel="stylesheet" href="../../public/CSS/stylespd.css">
    <link rel="stylesheet" href="../../public/CSS/responsivepd.css">
    <link rel="stylesheet" href="../../style.css"> 
    <!-- Link icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- Link fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Product Detail</title>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="row">
            <?php 
                include_once "../../components/header.php";
            ?>
        </div>
        <!-- NAV BreadCrumb-->
        <?php 
                // include_once "../../components/breadcrumb.php";
        ?>
        <?php
            // Load components breadcrumb
            // Trang chủ/Sản phẩm / <chi tiết của sp đã chọn>
            // Chọn trang chủ: nếu muốn quay về trang chủ
            // Chọn Sản Phẩm để vào trang tìm kiếm (hiển thị tất cả sản phẩm).
            // Tương tự với trang cart, checkout,...
            
            include_once "../../controllers/productController.php";
            $controller = new ProductController();
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $data = $controller->getProductById($id);
                foreach ($data as $product) {
                    echo '
                        <nav class ="row d-sm-none d-md-block" aria-label ="breadcrumb">
                            <ol class ="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    '.$product->getName().'
                                </li>
                            </ol>
                        </nav>
                    ';
                }
            }
        ?>
        <!-- CONTENT -->
        <div class='row'>
            <!-- Product -->
            <div class='col-lg-7 col-md-12 col-12'>
                <div class='imgpro'>
                    <?php 
                        include_once "../../controllers/cartController.php";
                        include_once "../../controllers/productController.php";
                        $controller = new ProductController();
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $data = $controller->getProductById($id);
                            foreach ($data as $product) {
                                echo "
                                    <img id='ProductImg' width='100%' src='".$product->getImage01()."' alt=''>
                                    <div class='img-icon'>
                                        <img src='".$product->getImage01()."' alt='' class='small-img'>
                                        <img src='".$product->getImage02()."' alt='' class='small-img'>
                                        <img src='".$product->getImage01()."' alt='' class='small-img'>
                                        <img src='".$product->getImage02()."' alt='' class='small-img'>
                                    </div>
                                ";
                            }
                        }
                    ?>        
                </div>
            </div>
            <!-- Detail Product -->
            <div class='col-lg-5 col-md-12 col-12 product-data'>
                <?php
                    include_once "../../controllers/productController.php";
                    $controller = new ProductController();
                    $data = $controller->getAllProduct();
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $data = $controller->getProductById($id);
                        foreach ($data as $product) {
                            $arraysize = explode(", ",$product->getSize());
                            $arraycolor = explode(", ",$product->getColor());
                            echo '      <div class="pro-title">
                                            <h3>'.$product->getName().'</h3>
                                        </div>
                                        <div class="detail-pro-price">
                                            <span class="detail-pro-sale">-30%</span>
                                            <span class="detail-pro-price" name="price">'.currency_format($product->getPrice()).'</span>
                                            <del>'.currency_format(2000000).'</del>
                                        </div>
                                        <div class="size-select">';?>
                                        <?php
                                            $sizechoose = '';
                                            foreach ($arraysize as $spro) { 
                                                echo '
                                                    <input type="radio" class="size-selector" name="size" id="'.strtoupper($spro).'" value="'.strtoupper($spro).'">
                                                    <label class="size-btn" for="'.strtoupper($spro).'">'.strtoupper($spro).'</label>';  
                                                $sizechoose = strtoupper($spro);
                                        }?>
                                        <?php
                                        echo '
                                        </div>
                                        <div class="color-select">';
                                        ?>
                                        <?php
                                            $colorchoose = '';
                                            foreach ($arraycolor as $cpro) {
                                                $colorHex = color_format($cpro);
                                                echo '
                                                    <input type="radio" class="color-selector" name="color" id="'.strtolower($cpro).'" value="'.strtolower($cpro).'">
                                                    <label class="color-btn" style="background-color:#'.$colorHex.';" for="'.strtolower($cpro).'"></label>';
                                                $colorchoose = strtolower($cpro);
                                            }
                                        ?>
                                        <?php
                                        echo '
                                        </div>                                                    
                                        <form action="./index.php?page=detailproduct&id='.$product->getId().'" method="post">                  
                                            <div class="selector-actions">
                                                <div class="quantity mb-3" style="clear: both;">
                                                    <button class="minusdecrease">-</button>
                                                    <input type="text" value="1" min="0" max="'.$product->getQuantity().'" name="prod_quantity" class="detail-number">
                                                    <button class="plusincrease">+</button>
                                                </div>
                                                <br style="clear: both"></br>
                            
                                                <div class="d-flex">
                                                    <button type="submit" name="action" value="addtocart" class="detail-btn add-btn">Thêm vào giỏ</button>
                                                    <button type="submit" name="action" value="buynow" class="detail-btn buy-btn">Mua ngay</button>
                                                    <input type="hidden" name="prod_id" value="'.$product->getId().'">
                                                    <input type="hidden" name="prod_name" value="'.$product->getName().'">
                                                    <input type="hidden" name="prod_image" value="'.$product->getImage01().'">
                                                    <input type="hidden" name="prod_price" value="'.$product->getPrice().'">
                                                    <input type="hidden" name="prod_size" value="'.$sizechoose.'">  
                                                    <input type="hidden" name="prod_color" value="'.$colorchoose.'">
                                                </div>
                                            </div>                 
                                        </form>';?>

                                        

                                        <?php
                                        // information product
                                        echo'
                                        <div class="info">
                                            <div class="info-list d-flex">
                                                <div class="info-item">Giới thiệu</div>
                                            </div>
                                            <div class="info-content">
                                                <div class="info-content-item block">
                                                    '.$product->getDescription().'
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <p class="desc-policy">
                                                <i class="fa-solid fa-truck-fast"></i>
                                                Giao hàng toàn quốc
                                            </p>
                                            <p class="desc-policy"> 
                                                <i class="fa-solid fa-thumbs-up"></i>
                                                Cam kết chính hãng
                                            </p>
                                            <p class="desc-policy">
                                                <i class="fa-solid fa-chess-queen"></i>
                                                Bảo hành trọn đời
                                            </p>
                                        </div>
                                        ';
                        }
                    }
                ?>
            </div>   
        </div>
        <!-- End detail product -->

        <!-- Size chart -->
        <div class='row introduction'>
            <div class='col-lg-12 col-12 sizechart'>
                <h3>Size chart</h3>
                <img class="sizechart-img" src='../../src/img/sizechart.jpg'>
                <div class='heading'>
                    <h2>Có thể bạn sẽ thích</h2>
                </div>
            </div>
        </div>
        <!-- End size chart -->
        
        <!-- Product List -->
        <div class='row pro-list'>
            <?php
                include_once "../../controllers/productController.php";
                $controller = new ProductController();
                $data = $controller->getAllProduct();
                foreach ($data as $product) {
                    if($product->getStatus() == 1) {
                        $arraycolor = explode(", ",$product->getColor());
                        echo ' 
                        <div class="col-lg-3 col-md-6 col-6 products">
                            <div class="card">
                                <div class="pro-img">
                                    <span class="badget">
                                        -50%
                                    </span>
                                    <a href="./index.php?page=detailproduct&id='.$product->getId().'">
                                        <img class="pro-img pro-img-1 ProductImg" src="'.$product->getImage01().'">
                                        <img class="pro-img" src="'.$product->getImage02().'">
                                    </a>
                                    <div class="pro-btn d-flex">
                                        <a href="./index.php?page=detailproduct&id='.$product->getId().'" class="hidden-btn">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title product-info">
                                        <div class="list-color d-flex">
                                            <div class="dot-list d-flex">
                                            ';?>
                                            <?php 
                                            foreach($arraycolor as $cpro) {
                                                $colorHex = color_format($cpro);
                                                echo '
                                                    <label class="color-button" style="background-color:#'.$colorHex.';" for="'.strtolower($cpro).'"></label>
                                                ';
                                            }
                                            ?>
                                            <?php 
                                            echo '
                                            </div>
                                            <div class="favorite">
                                                <span class="material-symbols-outlined favorite-icon">
                                                    favorite
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-name">
                                            '.$product->getName().'
                                        </div>
                                    </h5>
                                    <p class="card-text">
                                        </p><div class="product-price d-flex">
                                            <div class="product-price__new">'.currency_format(750000).'</div>
                                            <strike><div class="product-price__old">'.currency_format($product->getPrice()).'</div></strike>
                                        </div>
                                    <p></p>
                                    <a href="./index.php?page=detailproduct&id='.$product->getId().'" class="btn btn-primary" style="background-color: transparent; border: none;">
                                        <form action="./index.php?page=detailproduct&id='.$product->getId().'" method="post">
                                            <button type="submit" name="action" value="add" class="product-cart">
                                                <span class="material-symbols-outlined product-cart-icon">
                                                    local_mall
                                                </span>
                                                <p class="product-cart-buy">Mua ngay</p>
                                            </button>
                                            <input type="hidden" name="product_id" value="'.$product->getId().'">
                                            <input type="hidden" name="product_name" value="'.$product->getName().'">
                                            <input type="hidden" name="product_price" value="'.currency_format($product->getPrice()).'">
                                            <input type="hidden" name="product_img" value="'.$product->getImage02().'">
                                            <input type="hidden" name="product_size" value="'.$product->getSize().'">
                                            <input type="hidden" name="product_color" value="'.$product->getColor().'">
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>';       
                    }
                }
            ?>
            <div class="col-lg-12 col-md-12 col-12">
                <a href="#pro-load" id = "pro-load-more">Xem thêm</a>
            </div>
        </div>
        <!-- End product list -->

        <!-- FOOTER -->
        <?php 
            // include_once "../../components/footer.php";
        ?>
        <div class ="row" id="back-to-top">
            <span onclick="scrollToTop()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square-fill up-icon" viewBox="0 0 16 16">
                    <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                </svg>
            </span>  
        </div>
        <!-- End footer -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <script src="../../public/JS/detailProduct.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
</body>
</html>