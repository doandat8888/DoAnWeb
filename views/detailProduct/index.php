<?php
    
    include_once "../../modules/db_module.php";
    include_once "../../validate_module.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap v4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="../../public/CSS/basepd.css">
    <link rel="stylesheet" href="../../public/CSS/stylespd.css">
    <link rel="stylesheet" href="../../public/CSS/responsivepd.css">
    <link rel="stylesheet" href="../../style.css"> 
    <!-- Link icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- Link fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Product Detail</title>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="row">
            <?php 
                include_once "../../components/header.php";
            ?>
        </div>
        <?php         
            include_once "../../controllers/productController.php";
            $controller = new ProductController();
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $controller->getProductByIdBreadCrumb($id);
            }
        ?>
        <!-- CONTENT -->
        <div class='row'>
            <!-- Product -->
            <div class='col-lg-7 col-md-12 col-12'>
                <div class='imgpro'>
                    <?php 
                        include_once "../../controllers/productController.php";
                        $controller = new ProductController();
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $controller->getProductByIdImage($id);
                        }
                    ?>        
                </div>
            </div>
            <!-- Detail Product -->
            <div class='col-lg-5 col-md-12 col-12 product-data'>
                <?php
                    include_once "../../controllers/productController.php";
                    $controller = new ProductController();
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $controller->getProductById($id);
                    }
                ?>
            </div>   
        </div>
        <!-- End detail product -->

        <!-- Size chart -->
        <div class='row introduction'>
            <div class='col-lg-12 col-12 sizechart'>
                <h3>Size chart</h3>
                <img class="sizechart-img" src='../../src/img/sizechart.jpg'>
                <div class='heading'>
                    <h2>Có thể bạn sẽ thích</h2>
                </div>
            </div>
        </div>
        <!-- End size chart -->
        
        <!-- Product List -->
        <div class='row pro-list'>
            <?php
                include_once "../../controllers/productController.php";
                $controller = new ProductController();
                $controller->getAllProductDetail();
            ?>
            <div class="col-lg-12 col-md-12 col-12">
                <a href="#pro-load" id = "pro-load-more">Xem thêm</a>
            </div>
        </div>
        <!-- End product list -->

        <!-- FOOTER -->
        <?php 
            include_once "../../components/footer.php";
        ?>
        <div class ="row" id="back-to-top">
            <span onclick="scrollToTop()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square-fill up-icon" viewBox="0 0 16 16">
                    <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                </svg>
            </span>  
        </div>
        <!-- End footer -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
    <script src="../../public/JS/detailProduct.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>