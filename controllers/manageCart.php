<?php
if(isset($_POST['action'])) {
    $prod_name = $_POST['prod_name'];
    $prod_image = $_POST['prod_image'];
    $prod_price = $_POST['prod_price'];
    $prod_size = $_POST['prod_size'];
    $prod_color = $_POST['prod_color'];
    $prod_quantity = $_POST['prod_quantity'];
    $prod_id = $_POST['prod_id'];

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    //Làm rỗng giỏ hàng
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) {
        unset($_SESSION['cart']);
        echo 
        '<script>
            window.location.href = "index.php";
        </script>';
    }
    //Xóa một sản phẩm ra khỏi giỏ hàng
    if(isset($_GET['delid'])&&($_GET['delid']>=0)) {
        array_splice($_SESSION['cart'], $_GET['delid'], 1);
        echo 
        '<script>
            window.location.href = "index.php";
        </script>';
    }
    
    switch($_POST['action']) {
        case 'addtocart':
            //Kiểm tra sản phẩm đã có trong giỏ hàng hay chưa?
            //Nếu đã có sản phẩm trong giỏ hàng thì cập nhật lại số lượng.
            $flag = 0;
            $nquantity = 0;
            for ($i=0 ; $i < sizeof($_SESSION['cart'])  ; $i++ ) { 
                if($_SESSION['cart'][$i][6] == $prod_id && $_SESSION['cart'][$i][3] == $prod_size && $_SESSION['cart'][$i][4] == $prod_color) { 
                    $flag = 1;
                    $nquantity = $prod_quantity + $_SESSION['cart'][$i][5];
                    $_SESSION['cart'][$i][5] = $nquantity;
                    break;
                }
            }
            //Nếu sản phẩm chưa có trong giỏ hàng, ta thực hiện thêm mới.
            if($flag == 0) {
                $count = count($_SESSION['cart']);
                $product=[$prod_name, $prod_image, $prod_price, $prod_size, $prod_color, $prod_quantity, $prod_id];
                $_SESSION['cart'][$count] = $product;
            }
            break;
        case 'buynow':
            //Kiểm tra sản phẩm đã có trong giỏ hàng hay chưa?
            //Nếu đã có sản phẩm trong giỏ hàng thì cập nhật lại số lượng.
            $flag = 0;
            $newqty = 0;
            for ($i = 0 ; $i < count($_SESSION['cart'])  ; $i++ ) { 
                if($_SESSION['cart'][$i][6] == $prod_id && $_SESSION['cart'][$i][3] == $prod_size && $_SESSION['cart'][$i][4] == $prod_color) { 
                    $flag = 1;
                    $newqty = $prod_quantity + $_SESSION['cart'][$i][5];
                    $_SESSION['cart'][$i][5] = $newqty;
                    break;             
                }
            }
            //Nếu sản phẩm chưa có trong giỏ hàng, ta thực hiện thêm mới.
            if($flag == 0) {
                $count = count($_SESSION['cart']);
                $product=[$prod_name, $prod_image, $prod_price, $prod_size, $prod_color, $prod_quantity, $prod_id];
                $_SESSION['cart'][$count] = $product;
            }
            break;
    }
}
?>