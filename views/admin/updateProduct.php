<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/updateProduct.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>

<body>
    <?php
    // if(!function_exists('color_format')) {
    //     function color_format($colorStr) {
    //         $arrColorResult = [];
    //         $arrColorSelected = explode(", ", $colorStr);
    //         $arraycolor = array(
    //             "yellow" => "Vàng",
    //             "green" => "Xanh",
    //             "pink" => "Hồng",
    //             "red" => "Đỏ",
    //             "white" => "Trắng",
    //             "brown" => "Nâu",
    //             "red" => "Đỏ",
    //             "orange" => "Cam",
    //             "gray" => "Xám",
    //         );
    //         foreach($arrColorSelected as $colorSelected) {
    //             if(key($arraycolor) == $colorSelected) {
    //                 array_push($arrColorResult, $arraycolor[key($arraycolor)]);
    //             }
    //         }
    //         return $arrColorResult;
    //     }
    // }
    include_once "../../controllers/productController.php";
    include_once "../../controllers/categoryProductController.php";
    $productController = new ProductController();
    $categoryProductController = new CategoryProductController();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $productController->getProductByIdUpdate($id);
    }
    ?>
</body>

</html>