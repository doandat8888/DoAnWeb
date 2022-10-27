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
                "brown" => "C4B095",
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
<div class='row'>
    <?php
        include "./controllers/productController.php";
        $controller = new ProductController();
        
        if(isset($_GET['type'])) {
            $type = $_GET['type'];
            $controller->getProductByTypeLimitHome($type, 4, 0);
            echo "
                <button class='type-button'>
                    <a href='../views/product/index.php?type=".$type."' class='nav-item-link'>
                        Xem tất cả
                    </a>
                </button>
            ";
        }else {
            $controller->getProductByTypeLimitHome(1, 4, 0);
            echo "
                <button class='type-button'>
                    <a href='../views/product/index.php?type=1' class='nav-item-link'>
                        Xem tất cả
                    </a>
                </button>
            ";
        }
        
    ?>
</div>
