<?php 
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a76b54ad15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>
        <?php 
            if(isset($_GET['type'])) {
                $type = $_GET['type'];
                if($type == 0)  {
                    echo "Nam";
                }else if($type == 1) {
                    echo "Nữ";
                }else if($type == 2) {
                    echo "Trẻ em";
                }
            }else {
                echo "Sản phẩm";
            }
        ?>
    </title>
</head>
<body>
   <div class="container">
    <header>
        <?php include_once "../../components/header.php"?>
    </header>
    <br>
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb" style="background-color: #e9ecef; margin-top: 12rem;" class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php 
                        if(isset($_GET['type'])) {
                            $type = $_GET['type'];
                            if($type == 0)  {
                                echo "Nam";
                            }else if($type == 1) {
                                echo "Nữ";
                            }else if($type == 2) {
                                echo "Trẻ em";
                            }
                        }else {
                            echo "Sản phẩm";
                        }
                    ?>
                </li>
            </ol>
        </div>
    </nav>
    <!--Content-->
        <!--Filter + Products-->
    <div class="row">
        <!--Filter-->    
        <div class="col-lg-3">
            <div class="d-lg-none filter-heading" id="filter-control">
                Bộ lọc sản phẩm
                <i class="fas fa-angle-down" id="filter-arrow" style="margin-left: 0.5rem;"></i>
            </div>

            <div class="filter container" style="text-align: center;">

                <select title="Size" class="selectpicker" name="size" id="size" multiple required>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                </select>

                <select title="Màu sắc" class="selectpicker" name="color" id="color" multiple required>
                    <option value="yellow" style="color: var(--yellow);">Vàng</option>
                    <option value="green" style="color: var(--green);">Xanh lá</option>
                    <option value="pink" style="color: var(--pink);">Hồng</option>
                    <option value="red" style="color: var(--red);">Đỏ</option>
                    <option value="white" style="color: var(--white);">Trắng</option>
                    <option value="brown" style="color: var(--brown);">Nâu</option>
                    <option value="black" style="color: var(--black);">Đen</option>
                    <option value="orange" style="color: var(--orange);">Cam</option>
                    <option value="violet" style="color: var(--violet);">Tím</option>
                </select>

                <select title="Mức giá" class="selectpicker" name="price" id="price" required>
                    <option value="less_1m">Dưới đ1.000.000</option>
                    <option value="1m-2m">đ1.000.000 - đ2.000.000</option>
                    <option value="2m-3.5m">đ2.000.000 - đ3.500.000</option>
                    <option value="3.5m-5m">đ3.500.000 - đ5.000.000</option>
                    <option value="more_5m">Trên đ5.000.000</option>
                </select>

                <select title="Mức chiết khấu" class="selectpicker" name="discount" id="discount" required>
                    <option value="less_30">Dưới 30%</option>
                    <option value="30-50">30% - 50%</option>
                    <option value="50-70">50% - 70%</option>
                    <option value="more_70">Trên 70%</option>
                    <option value="special">Giá đặc biệt</option>
                </select>

                <div type="button" class="btn btnFilter" id="filterbutton">Filter</div>
                <div type="button" class="btn btnFilter" id="resetbutton">Reset</div>
            </div>
        </div>
        <!--Products-->
        <div class="col-12 col-lg-9">
            <!--Sort dropdown-->
            <div class="row">
                <div class="col-12 col-lg-5 col-md-5" style="z-index: 10000000; margin-top: 2rem;">
                    <select title="Sắp xếp theo" class="selectpicker" name="sorter" id="sorter" required>
                        <option value="default">Mặc định</option>
                        <option value="newest">Mới nhất</option>
                        <option value="most_purchased">Được mua nhiều nhất</option>
                        <option value="most_liked">Được yêu thích nhất</option>
                        <option value="hi_to_low">Giá: cao đến thấp</option>
                        <option value="low_to_hi">Giá: thấp đến cao</option>
                    </select>

                </div>
            </div>
            <!--The product-->
            <div class='row' id='product-body'>
                <?php 
                    include_once "../../controllers/productController.php";
                    $controller = new ProductController();
                    $currentPage = 1;
                    if(isset($_GET['current-page'])) {
                        $currentPage = $_GET['current-page'];
                    }
                    $limit = 4;
                    $offset = ($currentPage - 1) * $limit;
                    $totalPages = 0;
                    
                    if (isset($_GET["type"])){
                        $type = $_GET["type"];
                        $products = $controller->getProductByType($type);
                        $totalProducts = count($products);
                        $totalPages = ceil($totalProducts / $limit);
                        $data = $controller->getProductByTypeLimit($type, $limit, $offset);
                        foreach($data as $product){
                            $arraycolor = explode(", ",$product->getColor());
                            echo "
                            <div class='col-lg-3 col-md-6 col-6 product-search-result'>
                                <div class='card'>
                                    <div class='product-img'>
                                        <span class='badget'>
                                            -50%
                                        </span>
                                        <a href='../detailProduct/indexpd.php?id=".$product->getId()."'>
                                            <img src='".$product->getImage02()."' class='product-img-content product-img-2'/>
                                            <img src='".$product->getImage01()."' class='product-img-content product-img-1'/>
                                        </a>
                                        <div class='pro-btn d-flex'>
                                            <a href='../detailProduct/indexpd.php?id=".$product->getId()."' class='hidden-btn'>
                                                <i class='fa-solid fa-eye'></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title product-info'>
                                            <div class='list-color d-flex'>
                                                <div class='dot-list d-flex'>
                                                    ";?>
                                                    <?php 
                                                    foreach($arraycolor as $cpro) {
                                                        $colorHex = color_format($cpro);
                                                        echo '
                                                            <label class="color-button" style="background-color:#'.$colorHex.';" for="'.strtolower($cpro).'"></label>
                                                        ';
                                                    }
                                                    ?>
                                                    <?php 
                                                    echo "
                                                </div>
                                                <div class='favorite'>
                                                    <span class='material-symbols-outlined favorite-icon'>
                                                        favorite
                                                    </span>
                                                </div>
                                            </div>
                                            <div class='product-name'>
                                                ".$product->getName()."
                                            </div>
                                        </h5>
                                        <p class='card-text'>
                                            <div class='product-price d-flex'>
                                                <div class='product-price__new'>".currency_format($product->getPrice())."</div>
                                                <strike><div class='product-price__old'>1.150.000đ</div></strike>
                                            </div>
                                        </p>
                                        <a href='../detailProduct/indexpd.php?id=".$product->getId()."' class='btn btn-primary' style='background-color: transparent; border: none;'>
                                            <div class='product-cart'>
                                                <span class='material-symbols-outlined product-cart-icon'>
                                                    local_mall
                                                </span>
                                                <p class='product-cart-buy'>Mua ngay</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    }
                    else{
                        $products = $controller->getAllProduct();
                        $totalProducts = count($products);
                        $totalPages = ceil($totalProducts / $limit);
                        $data = $controller->getAllProductByLimit($limit, $offset);
                        foreach($data as $product){
                            $arraycolor = explode(", ",$product->getColor());
                            echo "
                            <div class='col-lg-3 col-md-6 col-6 product-search-result'>
                                <div class='card'>
                                    <div class='product-img'>
                                        <span class='badget'>
                                            -50%
                                        </span>
                                        <a href='../detailProduct/indexpd.php?id=".$product->getId()."'>
                                            <img src='".$product->getImage02()."' class='product-img-content product-img-2'/>
                                            <img src='".$product->getImage01()."' class='product-img-content product-img-1'/>
                                        </a>
                                        <div class='pro-btn d-flex'>
                                            <a href='../detailProduct/indexpd.php?id=".$product->getId()."' class='hidden-btn'>
                                                <i class='fa-solid fa-eye'></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title product-info'>
                                            <div class='list-color d-flex'>
                                                <div class='dot-list d-flex'>
                                                    ";?>
                                                    <?php 
                                                    foreach($arraycolor as $cpro) {
                                                        $colorHex = color_format($cpro);
                                                        echo '
                                                            <label class="color-button" style="background-color:#'.$colorHex.';" for="'.strtolower($cpro).'"></label>
                                                        ';
                                                    }
                                                    ?>
                                                    <?php 
                                                    echo "
                                                </div>
                                                <div class='favorite'>
                                                    <span class='material-symbols-outlined favorite-icon'>
                                                        favorite
                                                    </span>
                                                </div>
                                            </div>
                                            <div class='product-name'>
                                                ".$product->getName()."
                                            </div>
                                        </h5>
                                        <p class='card-text'>
                                            <div class='product-price d-flex'>
                                                <div class='product-price__new'>".currency_format($product->getPrice())."</div>
                                                <strike><div class='product-price__old'>1.150.000đ</div></strike>
                                            </div>
                                        </p>
                                        <a href='../detailProduct/indexpd.php?id=".$product->getId()."' class='btn btn-primary' style='background-color: transparent; border: none;'>
                                            <div class='product-cart'>
                                                <span class='material-symbols-outlined product-cart-icon'>
                                                    local_mall
                                                </span>
                                                <p class='product-cart-buy'>Mua ngay</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    }  
                    if(isset($_GET['type'])) {
                        $type = $_GET['type'];
                        for($i = 1; $i <= $totalPages; $i++) {
                            echo "
                                <a href='./index.php?type=".$type."&current-page=".$i."'>
                                    <li class='page-item'>$i</li>
                                </a>
                            ";
                        }  
                    }else {
                        for($i = 1; $i <= $totalPages; $i++) {
                            echo "
                                <a href='./index.php?&current-page=".$i."'>
                                    <li class='page-item'>$i</li>
                                </a>
                            ";
                        }  
                    }
                    
                ?>
            </div>
        </div>
    </div>
    <footer>
        <?php 
            include_once "../../components/footer.php";
        ?>
    </footer>
   </div>
    <script src="./script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</body>
</html>