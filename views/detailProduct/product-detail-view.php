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
        $arraysize = explode(", ",$product->getSize());
        $arraycolor = explode(", ",$product->getColor());?>
            
        <form action="../../controllers/cartController.php" method="POST">
            <?php
            echo'
                <div class="pro-title">
                    <h3 id="prod_name">'.$product->getName().'</h3>
                </div>
                <div class="detail-pro-price">
                    <span class="detail-pro-sale">-30%</span>
                    <span class="detail-pro-price" name="price">'.currency_format($product->getPrice()).'</span>
                    <del>'.currency_format(2000000).'</del>
                </div>
                <div class="size-select">';?>
                    <?php
                        foreach ($arraysize as $spro) { 
                            echo '
                                <input type="radio" class="size-selector" name="size" id="'.strtoupper($spro).'" value="'.strtoupper($spro).' "autocomplete="off" checked="">
                                <label class="size-btn" for="'.strtoupper($spro).'">'.strtoupper($spro).'</label>';  
                        }?>
            <?php
            echo '
                </div>
                <div class="color-select">';
            ?>
            <?php
                    foreach ($arraycolor as $cpro) {
                        $colorHex = color_format($cpro);
                        echo '
                            <input type="radio" class="color-selector" name="color" id="'.strtolower($cpro).'" value="'.strtolower($cpro).'" autocomplete="off" checked="">
                            <label class="color-btn" style="background-color:#'.$colorHex.';" for="'.strtolower($cpro).'"></label>';
                    }
            ?>
            <?php
            echo '
                </div>
                <div class="selector-actions">
                    <div class="quantity mb-3" style="clear: both;">
                            <button class="minusdecrease">-</button>
                            <input type="text" value="1" min="0" max="'.$product->getQuantity().'" name="prod_quantity" class="detail-number">
                            <button class="plusincrease">+</button>
                    </div>
                    <br style="clear: both"></br>
                    <div class="d-flex">
                        <input type="hidden" name="prod_id" value="'.$product->getId().'">
                        <input type="hidden" name="prod_name" value="'.$product->getName().'">
                        <input type="hidden" name="prod_image" value="'.$product->getImage01().'">
                        <input type="hidden" name="prod_price" value="'.$product->getPrice().'">
                        <input type="hidden" name="prod_quantity_max" value="'.$product->getQuantity().'">
            
                        <button type="submit" name="cartcontroller" value="addToCart" class="detail-btn add-btn gap-2 mx-auto ">Thêm vào giỏ</button>
                        <button type="submit" name="cartcontroller" value="buyNow" class="detail-btn buy-btn gap-2">Mua ngay</button>
                    </div>
                </div>

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
                </div>';
            ?>
        </form>
 <?php }
 ?>