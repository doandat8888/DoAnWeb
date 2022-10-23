<div class="product-filter">
    <?php 
        // if (!function_exists('currency_format')) {
        //     function currency_format($number, $suffix = 'đ') {
        //         if (!empty($number)) {
        //             return number_format($number, 0, ',', '.') . "{$suffix}";
        //         }
        //     }
        // }
        // if (!function_exists('color_format')) {
        //     function color_format($color) {
        //         $colorHex = "";
        //         $arraycolor = array(
        //             "blue" => "C6E9EC",
        //             "white" => "FFFFFF",
        //             "pink" => "FB6E7C",
        //             "orange" => "F3A45F",
        //             "yellow" => "F4ED95",
        //             "brown" => "C4B095",
        //             "red" => "EC3333",
        //             "black" => "212529",
        //             "green" => "98A882",
        //             "gray" => "A8A9AD",
        //         );
        //         while($element = current($arraycolor)) {
        //             if(key($arraycolor) == $color) {
        //                 $colorHex = $arraycolor[key($arraycolor)];
        //             }
        //             next($arraycolor);
        //         }
        //         return $colorHex;
        //     }
        // }
        include_once "../../controllers/productController.php";
        $controller = new ProductController();

        $data = NULL;
        if (isset($_GET["type"])){
            $type = $_GET["type"];
            if($type != -1) {
                $data = $controller->filterProductByTypeLimit($type, $limit, $offset);
            }
        }
        else{
            $data = $controller->filterProductByLimit($limit, $offset);
        }

        if($data == NULL) {
            echo "Không có sản phẩm nào được tìm thấy";
        }else {
            foreach($data as $product){
                if($product->getStatus() == 1) {
                    $arraycolor = explode(", ",$product->getColor());
                    echo "
                        <div class='col-lg-3 col-md-6 col-6'>
                            <div class='card'>
                                <div class='product-img'>
                                    <span class='badget'>
                                        -50%
                                    </span>
                                    <a href='../detailProduct/index.php?id=".$product->getId()."'>
                                        <img src='".$product->getImage02()."' class='product-img-content product-img-2'/>
                                        <img src='".$product->getImage01()."' class='product-img-content product-img-1'/>
                                    </a>
                                    <div class='pro-btn d-flex'>
                                        <a href='../detailProduct/index.php?id=".$product->getId()."' class='hidden-btn'>
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
                                    <a href='../detailProduct/index.php?id=".$product->getId()."' class='btn btn-primary' style='background-color: transparent; border: none;'>
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
        }
    ?>
</div>

<div class="page-list">
    <?php
        $_SESSION['type'] = isset($_GET['type'])?$_GET['type']:null;
        $limit = 4;
        $size_filter = '';
        $color_filter = '';
        $category_filter = '';
        $minPrice = -1;
        $maxPrice = -1;
        $currentPage = isset($_GET['current-page'])?$_GET['current-page']:1;

        if(isset($_POST['size'])) {
            $size = $_POST['size'];
            $size_filter = implode("','", $size);
            //array_push($arrInfo, $size);
        }
        if(isset($_POST['color'])) {
            $color = $_POST['color'];
            $color_filter = implode("','", $color);
        }

        if(isset($_GET['category'])) {
            $category = $_GET['category'];
            $category_filter = implode("", $category);
            $querystring = "";
            for($i = 0; $i < strlen($category_filter); $i++){
                $querystring  .= "&category%5B%5D=".$category_filter[$i];
            }
        }

        if(isset($_POST['minimumPrice']) && isset($_POST['maximumPrice'])) {
            $minPrice = $_POST['minimumPrice'];
            $maxPrice = $_POST['maximumPrice'];
            //array_push($arrInfo, $minPrice);
        }
        
        if(isset($type)){
            if($type != -1) {
                if(isset($_POST['action'])) {
                    $type = $_GET['type'];
                    $products = $controller->filterProductByType($type);
                }else {
                    $products = $controller->getProductByType($type);
                }
                if($products != NULL) {
                    $totalProducts = count($products);
                    $totalPages = ceil($totalProducts / $limit);
                    
                    if(isset($_GET['category'])){
                        for($i = 1; $i <= $totalPages; $i++) {
                            if($i != $currentPage){
                                echo "
                                    <a href='./index.php?&type=".$type."&current-page=".$i.$querystring ."' class='page-item'>$i</a>
                                ";
                            }
                            else{
                                echo"
                                    <strong style='background-color:black;' class='page-item'>$i</strong>
                                ";
                            }
                        }                        
                    }
                    else{
                        for($i = 1; $i <= $totalPages; $i++) {
                            if($i != $currentPage){
                                echo "
                                    <a href='./index.php?&type=".$type."&current-page=".$i."' class='page-item'>$i</a>
                                ";
                            }
                            else{
                                echo"
                                    <strong style='background-color:black;' class='page-item'>$i</strong>
                                ";
                            }
                        } 
                    }
                }   
            }
        }else {

            if(isset($_GET['category'])){
                $products = $controller->filterProduct();
            }else {
                $products = $controller->getAllProduct();
            }

            if($products != NULL) {
                $totalProducts = count($products);
                $totalPages = ceil($totalProducts / $limit);
                
                // Nếu có lọc
                if (isset($_GET['category'])){
                    for($i = 1; $i <= $totalPages; $i++) {
                        if($i != $currentPage){
                            echo "
                                <a href='./index.php?&current-page=".$i.$querystring."' class='page-item'>$i</a>
                            ";
                        }
                        else{
                            echo"
                                <strong style='background-color:black;' class='page-item'>$i</strong>
                            ";
                        }
                    }                    
                }
                else{ // Nếu ko lọc
                    for($i = 1; $i <= $totalPages; $i++) {
                        if($i != $currentPage){
                            echo "
                                <a href='./index.php?&current-page=".$i."' class='page-item'>$i</a>
                            ";
                        }
                        else{
                            echo"
                                <strong style='background-color:black;' class='page-item'>$i</strong>
                            ";
                        }
                    }  
                }
            }
        }
    ?>
</div>