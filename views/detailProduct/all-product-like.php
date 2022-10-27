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
<?php 
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