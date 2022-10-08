<?php
    session_start();
?>
<?
    include_once "../../modules/db_module.php";
    include_once "../../validate_module.php";
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
                include_once "../../components/breadcrumb.php";
        ?>
        <?php
            //Load components breadcrumb
            //Trang chủ/Sản phẩm / <chi tiết của sp đã chọn>
            //Chọn trang chủ: nếu muốn quay về trang chủ
            //Chọn Sản Phẩm để vào trang tìm kiếm (hiển thị tất cả sản phẩm).
            //Tương tự với trang cart, checkout,...
            //
            // include_once "../../controllers/productController.php";
            // $controller = new ProductController();
            // if(isset($_GET['id'])) {
            //     $id = $_GET['id'];
            //     $data = $controller->getProductById($id);
            //     foreach ($data as $product) {
            //         echo '
            //             <nav class ="row d-sm-none d-md-block" aria-label ="breadcrumb">
            //                 <ol class ="breadcrumb">
            //                     <li class="breadcrumb-item">
            //                         <a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a>
            //                     </li>
            //                     <li class="breadcrumb-item active" aria-current="page">
            //                         '.$product->getName().'
            //                     </li>
            //                 </ol>
            //             </nav>
            //         ';
            //     }
            // }
        ?>
        <!-- CONTENT -->
        <div class='row'>
            <!-- Product -->
            <div class='col-lg-7 col-md-12 col-12'>
                <div class='imgpro'>
                    <?php 
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
            <div class='col-lg-5 col-md-12 col-12'>
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
                            echo '  <div class="pro-title">
                                            <h3>'.$product->getName().'</h3>
                                        </div>
                                        <div class="detail-pro-price">
                                            <span class="detail-pro-sale">-30%</span>
                                            <span class="detail-pro-price">'.currency_format($product->getPrice()).'</span>
                                            <del>'.currency_format(2000000).'</del>
                                        </div>
                                        <form action="./indexpd.php?to=cart&id_product='.$product->getId().'&action=them&size='.$product->getSize().'&color='.$product->getColor().' method="GET">
                                            <input type="hidden" name="to" value="cart">
                                            <input type="hidden" name="id_product" value="'.$product->getId().'">
                                            <input type="hidden" name="action" value="them">
                                            <div class="size-select"> 
                                                ';?>
                                                <?php
                                                        foreach ($arraysize as $spro) { 
                                                        echo '
                                                            <input type="radio" class="size-selector" name="size" id="'.strtoupper($spro).'" value="'.strtoupper($spro).'" autocomplete="off" checked="">
                                                            <label class="size-btn" for="'.strtoupper($spro).'">'.strtoupper($spro).'</label>
                                                        ';  
                                                }
                                                ?>
                                            <?php
                                            echo '
                                            </div>
                                            <div class="color-select">
                                                ';?>
                                                <?php
                                                    foreach ($arraycolor as $cpro) {
                                                        $colorHex = color_format($cpro);
                                                        echo '
                                                            <input type="radio" class="color-selector" name="color" id="'.strtolower($cpro).'" value="'.strtolower($cpro).'" autocomplete="off" checked="">
                                                            <label class="color-btn" style="background-color:#'.$colorHex.';" for="'.strtolower($cpro).'"></label>
                                                        ';
                                                    }
                                                ?>
                                            <?php
                                            echo '
                                            </div>
                                            <div class="selector-actions">
                                                <div class="quantity" style="clear: both">
                                                    <button class="minusdecrease" onclick="creaseCount(event, this)">-</button>
                                                    <input type="text" value="1" min="0" max="10" class="detail-number">
                                                    <button class="plusincrease" onclick="increaseCount(event, this)">+</button>
                                                </div>
                            
                                                <br style="clear: both"></br>
                            
                                                <div class="d-flex">
                                                    <button type="submit" name="from" value="themvaogio" class="detail-btn add-btn add-cart">Thêm vào giỏ</button>
                                                    <button type="submit" name="from" value="muangay" class="detail-btn buy-btn">Mua ngay</button>
                                                </div>
                                            </div>                       
                                        </form>
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
                <!-- <div class="pro-title">
                    <h3>Áo lụa cách điệu phối nơ lệch</h3>
                </div>
                <div class='detail-pro-price'>
                    <span class='detail-pro-sale'>-30%</span>
                    <span class='detail-pro-price'>895.000₫</span>
                    <del>1.270.000₫</del>
                </div>
                <form action='./' method='GET'>
                    <input type='hidden' name='to' value='cart'>
                    <input type='hidden' name='id_product' value='1'>
                    <input type='hidden' name='action' value='them'>
                    <div class='size-select'>
                        <input type='radio' class='size-selector' name='size' id='S' value='S' autocomplete='off' checked=''>
                        <label class='size-btn' for='S'>S</label>
                        <input type='radio' class='size-selector' name='size' id='M' value='M' autocomplete='off' checked=''>
                        <label class='size-btn' for='M'>M</label>
                        <input type='radio' class='size-selector' name='size' id='L' value='L' autocomplete='off' checked=''>
                        <label class='size-btn' for='L'>L</label>
                        <input type='radio' class='size-selector' name='size' id='XL' value='XL' autocomplete='off' checked=''>
                        <label class='size-btn' for='XL'>XL</label>
                    </div>
                    <div class='color-select'>
                        <input type='radio' class='color-selector' name='color' id='green' value='green' autocomplete='off' checked=''>
                        <label class='color-btn' for='green'></label>
                        <input type='radio' class='color-selector' name='color' id='pink' value='pink' autocomplete='off' checked=''>
                        <label class='color-btn' for='pink'></label>
                        <input type='radio' class='color-selector' name='color' id='yellow' value='yellow' autocomplete='off' checked=''>
                        <label class='color-btn' for='yellow'></label>
                    </div>

                    <div class="selector-actions">
                        <div class='quantity' style='clear: both'>
                            <button class='minusdecrease' onclick="creaseCount(event, this)">-</button>
                            <input type='text' value='1' min='0' max='10' class='detail-number'>
                            <button class='plusincrease' onclick="increaseCount(event, this)">+</button>
                        </div>
    
                        <br style='clear: both'></br>
    
                        <div class='d-flex'>
                            <button type='submit' name='from' value='themvaogio' class='detail-btn add-btn add-cart'>Thêm vào giỏ</button>
                            <button type='submit' name='from' value='muangay' class='detail-btn buy-btn'>Mua ngay</button>
                        </div>
                    </div>                       
                </form>
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
                <div class="info">
                    <div class="info-list d-flex">
                        <div class="info-item">Giới thiệu</div>
                    </div>
                    <div class="info-content">
                        <div class="info-content-item block">
                            Áo kiểu dáng suông, cổ 3 phân, kết hợp thiết nơ lệch phần cổ, nút cài 1 bên vai. Chất liệu lụa trơn có độ bắt sáng tạo cảm giác mềm mại, sang chảnh. 
                            <br>
                            <br>
                            Nếu nàng theo đuổi phong cách sang chảnh, quý phái dành với nét đẹp cổ điển thì thiết kế áo sơ mi này chính là lựa chọn hoàn hảo dành cho bạn. Nàng có thể kết hợp mẫu áo này cùng chân váy bút chì hoặc quần âu diện đi làm, đi chơi.
                        </div>
                    </div>
                </div> -->
            </div>   
        </div>
        <div class='row introduction'>
            <div class='col-lg-12 col-12 sizechart'>
                <h3>Size chart</h3>
                <img class="sizechart-img" src='../../src/img/sizechart.jpg'>
                <div class='heading'>
                    <h2>Có thể bạn sẽ thích</h2>
                </div>
            </div>
        </div> 
        <div class='row pro-list'>
            <?php
                include_once "../../controllers/productController.php";
                $controller = new ProductController();
                $data = $controller->getAllProduct();
                foreach ($data as $product) {
                    if($product->getStatus() == 1) {
                        echo ' <div class="col-lg-3 col-md-6 col-6 products">
                                    <div class="card">
                                            <div class="pro-img">
                                                <span class="badget">
                                                    -50%
                                                </span>
                                                <a href="./indexpd.php?page=detailproduct&id='.$product->getId().'">
                                                    <img class="pro-img pro-img-1 ProductImg" src="'.$product->getImage01().'">
                                                    <img class="pro-img" src="'.$product->getImage02().'">
                                                </a>
                                                <div class="pro-btn d-flex">
                                                    <a href="#" class="hidden-btn">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title product-info">
                                                    <div class="list-color d-flex">
                                                        <div class="dot-list d-flex">
                                                            <div class="dot green"></div>
                                                            <div class="dot pink"></div>
                                                            <div class="dot yellow"></div>
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
                                                        <div class="product-price__new">750.000đ</div>
                                                        <strike><div class="product-price__old">'.currency_format($product->getPrice()).'</div></strike>
                                                    </div>
                                                <p></p>
                                                <a href="#" class="btn btn-primary" style="background-color: transparent; border: none;">
                                                    <div class="product-cart">
                                                        <span class="material-symbols-outlined product-cart-icon">
                                                            local_mall
                                                        </span>
                                                        <p class="product-cart-buy">Mua ngay</p>
                                                    </div>
                                                </a>
                                            </div>
                                    </div>
                                </div>';       
                    }
                }
            ?>
            <!-- <div class='col-lg-3 col-md-6 col-6 products'>
                <div class="card">
                    <div class="pro-img">
                        <span class="badget">
                            -50%
                        </span>
                        <a href='#'>
                            <img class="pro-img pro-img-1 ProductImg' src='../../src/img/products/women/product-women-1-2 (2).jpg'>
                            <img class="pro-img' src='../../src/img/products/women/product-women-1-1 (3).jpg'>
                        </a>
                        <div class="pro-btn d-flex'>
                            <a href='#' class='hidden-btn'>
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title product-info">
                            <div class="list-color d-flex">
                                <div class="dot-list d-flex">
                                    <div class="dot green"></div>
                                    <div class="dot pink"></div>
                                    <div class="dot yellow"></div>
                                </div>
                                <div class="favorite">
                                    <span class="material-symbols-outlined favorite-icon">
                                        favorite
                                    </span>
                                </div>
                            </div>
                            <div class="product-name">
                                Đầm Lụa Cách Điệu Phối Nơ Lệch
                            </div>
                        </h5>
                        <p class="card-text">
                            </p><div class="product-price d-flex">
                                <div class="product-price__new">750.000đ</div>
                                <strike><div class="product-price__old">1.150.000đ</div></strike>
                            </div>
                        <p></p>
                        <a href="#" class="btn btn-primary" style="background-color: transparent; border: none;">
                            <div class="product-cart">
                                <span class="material-symbols-outlined product-cart-icon">
                                    local_mall
                                </span>
                                <p class="product-cart-buy">Mua ngay</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12 col-md-12 col-12">
                <a href="#pro-load" id = "pro-load-more">Xem thêm</a>
            </div>
        </div>
        <!-- FOOTER -->
        <?php 
            include_once "../../components/footer.php";
        ?>
        <div class ="row" id="back-to-top">
            <span onclick="scrollToTop()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square-fill up-icon" viewBox="0 0 16 16">
                    <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                </svg>
            </span>  
        </div>    
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <script src="../../public/JS/detailProduct.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
</body>
</html>