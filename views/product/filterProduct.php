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
        $currentPage = isset($_GET['current-page'])?$_GET['current-page']:1;
        $limit = 4;
        $offset = ($currentPage - 1) * $limit;
        $totalPages = 0;
        if (isset($_GET["type"])){
            $type = $_GET["type"];
            if($type != -1) {
                $controller->filterProductByTypeLimit($type, $limit, $offset);
            }
        }
        else{
                $controller->filterProductByLimit($limit, $offset);
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
                    $controller->filterProductByTypePage($type);
                }else {
                    $controller->getProductByTypePage($type);
                }
                
            }
        }else {

            if(isset($_GET['category'])){
                $controller->filterProduct();
            }else {
                $controller->getAllProductFilterPage();
            }
        }
    ?>
</div> 