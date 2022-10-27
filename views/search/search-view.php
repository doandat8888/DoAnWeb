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
?>

<?php 
    if (empty($data)){
        echo "<h1 style='margin-left:1rem;'>Không tìm thấy kết quả nào</h1>";
    }
    else{
        foreach($data as $product){
            $arraycolor = explode(", ",$product->getColor());
            echo "  
            <div class='col-lg-3 col-md-6 col-6 product-search-result'>
                <div class='card'>
                    <div class='product-img'>
                        <span class='badget'>
                            -50%
                        </span>
                        <a href='../../views/detailProduct/index.php?id=".$product->getId()."'>
                            <img src='".$product->getImage02()."' class='product-img-content product-img-2'/>
                            <img src='".$product->getImage01()."' class='product-img-content product-img-1'/>
                        </a>
                        <div class='pro-btn d-flex'>
                            <a href='#' class='hidden-btn'>
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
                                        foreach ($arraycolor as $cpro){
                                            $colorHex = color_format($cpro);
                                            echo '<label class="color-button" style="background-color:#'.$colorHex.';" for="'.strtolower($cpro).'"></label>'; 
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
?>