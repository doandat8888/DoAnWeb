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
                "brown" => "C4B095",
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
    $products = NULL;
    $limit = 4;
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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
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
                <form action="#" method="get">
                    <!-- <select title="Size" class="selectpicker" name="size" id="size" multiple required>
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                        <option value="xxl">XXL</option>
                    </select> -->

                    <!-- <div class="size-container filter">
                        <div class="filter-title">Size</div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-size" value="s" />  S
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-size" value="m" />  M
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-size" value="l" />  L
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-size" value="xl" />  XL
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-size" value="xxl" />  XXL
                        </div>
                    </div>-->
                    <!-- <select title="Màu sắc" class="selectpicker" name="color" id="color" multiple required>
                        <option value="yellow" style="color: var(--yellow);">Vàng</option>
                        <option value="green" style="color: var(--green);">Xanh lá</option>
                        <option value="pink" style="color: var(--pink);">Hồng</option>
                        <option value="red" style="color: var(--red);">Đỏ</option>
                        <option value="white" style="color: var(--white);">Trắng</option>
                        <option value="brown" style="color: var(--brown);">Nâu</option>
                        <option value="black" style="color: var(--black);">Đen</option>
                        <option value="orange" style="color: var(--orange);">Cam</option>
                        <option value="violet" style="color: var(--violet);">Tím</option>
                    </select> -->

                    <!-- <div class="color-container filter">
                        <div class="filter-title">Màu sắc</div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="yellow" />  Vàng
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="green" />  Xanh lá
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="pink" />  Hồng
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="red" />  Đỏ
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="white" />  Trắng
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="brown" />  Nâu
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="black" />  Đen
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="orange" />  Cam
                        </div>
                        <div class="filter-item">
                            <input type="checkbox" class="filter-item-check pro-color" value="gray" />  Xám
                        </div>
                    </div> -->

                    <?php 
                        if(isset($_GET['type'])){
                            echo "<input type='hidden' name='type' value='".$_GET['type']."'>";
                        }
                    ?>

                    <div class="category-container filter-content-first">
                        <div class="filter-title">Danh mục</div>
                        <?php 
                            include_once "../../controllers/categoryProductController.php";
                            $controller = new CategoryProductController();
                            $controller->getCategoryListFilter();
                        ?>
                    </div>

                    <!-- <select title="Mức giá" class="selectpicker" name="price" id="price" required>
                        <option value="less_1m">Dưới đ1.000.000</option>
                        <option value="1m-2m">đ1.000.000 - đ2.000.000</option>
                        <option value="2m-3.5m">đ2.000.000 - đ3.500.000</option>
                        <option value="3.5m-5m">đ3.500.000 - đ5.000.000</option>
                        <option value="more_5m">Trên đ5.000.000</option>
                    </select> -->
                    
                    <div class="price filter-content">
                        <!-- <div class="price-title">Khoảng giá</div>
                        <input type="hidden" name="hidden-minimum-price" value="0"></input>
                        <input type="hidden" name="hidden-maximum-price" value="10000000"></input>
                        <div id="price-show"></div>
                        <div id="price-range"></div> -->
                        <div class="price-title">Khoảng giá</div>
                        <p style="font-size: 12px; margin-top:1rem;">Dùng slider hoặc nhập giá trị vào</p>
                        <div class="price-input">
                            <div class="field">
                                <input type="number" name="input-min" class="input-min" value="0">
                            </div>
                            <div class="separator"> đến </div>
                            <div class="field">
                                <input type="number" name="input-max" class="input-max" value="10000000">
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" class="range-min" min="0" max="10000000" value="0" step="500000">
                            <input type="range" class="range-max" min="0" max="10000000" value="10000000" step="500000">
                        </div>
                    </div>

                    <!-- <select title="Mức chiết khấu" class="selectpicker" name="discount" id="discount" required>
                        <-value="less_30">Dưới 30%</->
                        <option value="30-50">30% - 50%</option>
                        <option value="50-70">50% - 70%</option>
                        <option value="more_70">Trên 70%</option>
                        <option value="special">Giá đặc biệt</option>
                    </select> -->

                    <button type="submit" class="btn btn-black btnFilter" id="filterbutton">Lọc</button>
                    <!-- <?php 
                        // if (isset($_GET["type"])){
                        //     $type = $_GET["type"];
                        //     echo "<input type='hidden' name='type' value='".$type."'></input>";
                        // }else {
                        //     echo "<input type='hidden' name='type' value='-1'></input>";
                        // }
        
                        // if(isset($_GET["current-page"])) {
                        //     $currentPage = $_GET["current-page"];
                        //     echo "<input type='hidden' name='current-page' value='".$currentPage."'></input>";
                        // }else {
                        //     echo "<input type='hidden' name='current-page' value='1'></input>";
                        // }
        
                        // if(isset($_GET["size"])) {
                        //     $size = $_GET["size"];
                        //     if($size != '') {
                        //         echo "<input type='hidden' name='size' value='".$size."'></input>";
                        //     }else {
                        //         echo "<input type='hidden' name='size' value=''></input>";
                        //     }
                        // }
        
                        // if(isset($_GET["color"])) {
                        //     $color = $_GET["color"];
                        //     if($color != '') {
                        //         echo "<input type='hidden' name='color' value='".$color."'></input>";
                        //     }else {
                        //         echo "<input type='hidden' name='color' value=''></input>";
                        //     }
                        // }
        
                        // if(isset($_POST["category"])) {
                        //     $category = $_POST["category"];
                        //     if($category != '') {
                        //         echo "<input type='hidden' name='category' value='".$category."'></input>";
                        //     }else {
                        //         echo "<input type='hidden' name='category' value='-1'></input>";
                        //     }
                        // }else {
                        //     echo "<input type='hidden' name='category' value='-1'></input>";
                        // }
        
                        // if(isset($_GET["min-price"]) && $_GET["max-price"]) {
                        //     $minPrice = $_GET["min-price"]
                        //     $maxPrice = $_GET["max-price"];
                        //     if($minPrice != -1 && $maxPrice != -1) {
                        //         echo "<input type='hidden' name='minimum-price' value='".$minPrice."'></input>";
                        //         echo "<input type='hidden' name='maximum-price' value='".$maxPrice."'></input>";
                        //     }else {
                        //         echo "<input type='hidden' name='minimum-price' value='-1'></input>";
                        //         echo "<input type='hidden' name='maximum-price' value='-1'></input>";
                        //     }
                        // }else {
                        //     echo "<input type='hidden' name='minimum-price' value='-1'></input>";
                        //     echo "<input type='hidden' name='maximum-price' value='-1'></input>";
                        // }
                    ?> -->
                </form>
            </div>
        </div>

        <!--NƠI HIỆN SẢN PHẨM + PHÂN TRANG-->
        <div class="col-12 col-lg-9">
            <div class='products' id='product-body'>          
                <?php
                    require_once "../../controllers/productController.php";
                    $controller = new ProductController();
                    $controller->Display();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
</body>
</html>