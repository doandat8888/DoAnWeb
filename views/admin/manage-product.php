<?php 
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>

<div class="manage-product">
    <!-- Modal -->
    <form method="post" action="./index.php?page=manage-product">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="product-info-list col-12 d-flex">
                            <div class="product-info-item col-6">
                                <div class="product-info-item-title">Tên sản phẩm</div>
                                <input type="text" placeholder="Nhập tên sản phẩm" class="product-info-item-input" name="pro-name">
                            </div>
                            <div class="product-info-item col-6">
                                <div class="product-info-item-title">Màu sắc</div>
                                <input type="text" placeholder="Nhập màu sắc" class="product-info-item-input" name="pro-color">
                            </div>
                            <div class="product-info-item col-6">
                                <div class="product-info-item-title">Kích thước</div>
                                <input type="text" placeholder="Nhập kích thước" class="product-info-item-input" name="pro-size">
                            </div>
                            <div class="product-info-item col-6">
                                <div class="product-info-item-title">Nhập giá</div>
                                <input type="text" placeholder="Nhập giá" class="product-info-item-input" name="pro-price">
                            </div>
                            <div class="product-info-item col-6">
                                <div class="product-info-item-title">Nhập số lượng</div>
                                <input type="text" placeholder="Nhập số lượng" class="product-info-item-input" name="pro-quantity">
                            </div>
                            <div class="product-info-item col-6">
                                <div class="product-info-item-title">Mô tả</div>
                                <input type="text" placeholder="Nhập mô tả" class="product-info-item-input" name="pro-description">
                            </div>
                            <div class="product-info-item col-6">
                                <div class="product-info-item-title">Loại</div>
                                <select class="product-info-item-input" name="pro-type">
                                    <option value="-1">Chọn loại</option>
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                    <option value="2">Trẻ em</option>
                                </select>
                            </div>
                            <div class="product-info-item col-6">
                                <div class="product-info-item-title">Danh mục</div>
                                <select class="product-info-item-input" name="pro-category">
                                    <option value="-1">Chọn danh mục</option>
                                    <option value="0">Đầm Thun</option>
                                    <option value="1">Đầm Dạ Hội</option>
                                    <option value="2">Áo Set</option>
                                    <option value="3">Áo Thun</option>
                                    <option value="4">Áo Polo</option>
                                    <option value="5">Áo Ngắn Tay</option>
                                    <option value="6">Quần Sooc</option>
                                    <option value="7">Áo Sơmi</option>
                                </select>
                            </div>
                            <div class="product-info-item col-12">
                                <div class="product-info-item-title">Link ảnh 1</div>
                                <input type="text" placeholder="Nhập link ảnh 1" class="product-info-item-input" name="pro-img-01">
                            </div>
                            <div class="product-info-item col-12">
                                <div class="product-info-item-title">Link ảnh 2</div>
                                <input type="text" placeholder="Nhập link ảnh 2" class="product-info-item-input" name="pro-img-02">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" name="add-submit">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="title">Quản lí sản phẩm</div>
    <div class="search-add col-12 d-flex">
        <form class="search col-8" method="post" action="./index.php?page=manage-product">
            <input type="text" class="search-input" placeholder="Nhập từ khóa..." name="keyword" />
            <!-- <a href="../../views/admin/index.php?page=manage-product"> -->
                <button type="submit" class="search-btn" name="search-submit">
                    <span class="material-symbols-outlined search-icon">
                        search
                    </span>
                </button>
            <!-- </a> -->
        </form>
        <button class="add-btn col-2" data-toggle="modal" data-target="#addModal">
            <span class="material-symbols-outlined add-icon">
                add
            </span>
            Thêm
        </button>
    </div>
    <div class="manage-product-body">
        <table class="manage-product-table table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col-1">ID</th>
                    <th scope="col-2">Hình ảnh</th>
                    <th scope="col-3">Tên sản phẩm</th>
                    <th scope="col-2">Giá</th>
                    <th scope="col-4">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once "../../controllers/productController.php";
                    $controller = new ProductController();
                    $data = $controller->getAllProduct();
                    
                    if(isset($_POST['add-submit'])) {
                        $name = $_POST['pro-name'];
                        $color = $_POST['pro-color'];
                        $size = $_POST['pro-size'];
                        $price = $_POST['pro-price'];
                        $quantity = $_POST['pro-quantity'];
                        $type = $_POST['pro-type'];
                        $description = $_POST['pro-description'];
                        $categoryId = $_POST['pro-category'];
                        $image01 = $_POST['pro-img-01'];
                        $image02 = $_POST['pro-img-02'];
                        $result = $controller->setProduct($name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02);
                        if($result === -1) {
                            echo "<script type='text/javascript'>alert('Vui lòng nhập đủ thông tin sản phẩm');</script>";
                        }else if($result == 1) {
                            echo "<script type='text/javascript'>alert('Tên sản phẩm đã tồn tại');</script>";
                        }else if($result == 0) {
                            echo "<script type='text/javascript'>alert('Thêm sản phẩm thành công');</script>";
                        }
                    }
                    
                    if(isset($_POST['edit-submit'])) {
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $name = $_POST['pro-name'];
                            $color = $_POST['pro-color'];
                            $size = $_POST['pro-size'];
                            $price = $_POST['pro-price'];
                            $quantity = $_POST['pro-quantity'];
                            $type = $_POST['pro-type'];
                            $description = $_POST['pro-description'];
                            $categoryId = $_POST['pro-category'];
                            $image01 = $_POST['pro-img-01'];
                            $image02 = $_POST['pro-img-02'];
                            $result = $controller->updateProduct($id, $name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02);
                            if($result === -1) {
                                echo "<script type='text/javascript'>alert('Vui lòng nhập đủ thông tin sản phẩm');</script>";
                            }else if($result == 1) {
                                echo "<script type='text/javascript'>alert('Có lỗi xảy ra');</script>";
                            }else if($result == 0) {
                                echo "<script type='text/javascript'>alert('Cập nhật sản phẩm thành công');</script>";
                            }
                        }
                    }
                    

                    if(isset($_GET['action'])) {
                        if($_GET['action'] == 'delete') {
                            if(isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $controller = new ProductController();
                                $result = $controller->deleteProduct($id);
                                if($result == true) {
                                    echo "<script type='text/javascript'>alert('Xóa sản phẩm thành công');</script>";
                                }else if($result == false) {
                                    echo "<script type='text/javascript'>alert('Có lỗi xảy ra');</script>";
                                }
                            }
                        }
                    }

                    $currentPage = 0;
                    if(isset($_POST['page-submit'])) {
                        $currentPage = $_POST['page-submit'];
                    }else {
                        $currentPage = 1;
                    }
                    $limit = 4;
                    $offset = ($currentPage - 1) * $limit;
                    $keyword = "";
                    $data = NULL;
                    if(isset($_POST['search-submit'])) {
                        if(isset($_SESSION['keyword'])) {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                unset($_SESSION['keyword']);
                                $_SESSION['keyword'] = $keyword;
                            }else {
                                $keyword = $_SESSION['keyword'];
                            }
                        }else {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                $_SESSION['keyword'] = $keyword;
                            }
                        }
                        $data = $controller->getProductByNameLimit($keyword, $limit, $offset);
                    }else {
                        if(isset($_SESSION['keyword'])) {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                unset($_SESSION['keyword']);
                                $_SESSION['keyword'] = $keyword;
                                $data = $controller->getProductByNameLimit($keyword, $limit, $offset);
                            }else {
                                if(isset($_POST['page-submit'])) {
                                    $keyword = $_SESSION['keyword'];
                                    $data = $controller->getProductByNameLimit($keyword, $limit, $offset);
                                }else {
                                    unset($_SESSION['keyword']);
                                    $data = $controller->getAllProductByLimit($limit, $offset);
                                }
                            }
                        }else {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                $_SESSION['keyword'] = $keyword;
                                $data = $controller->getProductByNameLimit($keyword, $limit, $offset);
                            }else {
                                $data = $controller->getAllProductByLimit($limit, $offset);
                            }
                        }
                    }
                    foreach ($data as $product) {
                        if($product->getStatus() == 1) {
                            echo "
                                <tr>
                                    <th scope='row'>" . $product->getId() . "</th>
                                    <td class='product-img-container col-2'><img src='" . $product->getImage01() . "' class='manage-product-img col-lg-6 col-12'></td>
                                    <td>" . $product->getName() . "</td>
                                    <td>" . currency_format($product->getPrice()) . "</td>
                                    <td class='manage-product-action'>
                                        <a href='./index.php?page=update-product&id=".$product->getId()."'>
                                            <button class='edit action-btn' data-toggle='modal' data-target='#editModal'>
                                                Sửa
                                            </button>
                                        </a>
                                        <a href='./index.php?page=manage-product&action=delete&id=".$product->getId()."'>
                                            <button class='delete action-btn' type='submit'>Xóa</button>
                                        </a>
                                    </td>
                                </tr>   
                            ";
                        }
                    }
                ?>
            </tbody>
        </table>
        <div class="page-list">
            <?php 
                include_once "../../controllers/productController.php";
                $controller = new ProductController();
                $products = NULL;
                $name = "";
                if(isset($_POST['search-submit'])) {
                    if(isset($_POST['keyword'])) {
                        $name = $_POST['keyword'];
                        $products = $controller->getProductByName($name);
                    }
                }else {
                    if(isset($_SESSION['keyword'])) {
                        $name = $_SESSION['keyword'];
                        $products = $controller->getProductByName($name);
                    }else {
                        $products = $controller->getAllProduct();
                    }
                }
                $currentPage = 1;
                if(isset($_GET['current-page'])) {
                    $currentPage = $_GET['current-page'];
                }
                $limit = 4;
                $offset = ($currentPage - 1) * $limit;
                $totalPages = 0;
                $totalProducts = count($products);
                $totalPages = ceil($totalProducts / $limit);
                for($i = 1; $i <= $totalPages; $i++) {
                    echo "
                        <form method='post' action='./index.php?page=manage-product'>
                            <button class='page-item' name='page-submit' type='submit' value='".$i."'>$i</button>
                        </form>
                    ";
                }  
            ?>
        </div>
    </div>
</div>