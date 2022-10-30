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
            <div class="modal-dialog col-12" role="document">
                <div class="modal-content col-12 col-sm-12 col-lg-6">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="product-info-list col-12 d-flex">
                            <div class="product-info-item col-12 col-sm-12 col-lg-6">
                                <div class="product-info-item-title">Tên sản phẩm</div>
                                <input type="text" placeholder="Nhập tên sản phẩm" class="product-info-item-input" name="pro-name">
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6">
                                <div class="product-info-item-title">Màu sắc</div>
                                <!-- <input type="text" placeholder="Nhập màu sắc" class="product-info-item-input" name="pro-color"> -->
                                <select title="Chọn màu sắc" class="selectpicker product-info-item-input" name="pro-color[]" id="color" multiple required>
                                    <option value="yellow" style="color: var(--yellow);">Vàng</option>
                                    <option value="green" style="color: var(--green);">Xanh lá</option>
                                    <option value="pink" style="color: var(--pink);">Hồng</option>
                                    <option value="red" style="color: var(--red);">Đỏ</option>
                                    <option value="white" style="color: var(--white);">Trắng</option>
                                    <option value="brown" style="color: var(--brown);">Nâu</option>
                                    <option value="black" style="color: var(--black);">Đen</option>
                                    <option value="orange" style="color: var(--orange);">Cam</option>
                                    <option value="gray" style="color: var(--gray);">Xám</option>
                                </select>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6">
                                <div class="product-info-item-title">Kích thước</div>
                                <select title="Chọn kích thước" class="selectpicker product-info-item-input" name="pro-size[]" id="size" multiple required>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="xxl">XXL</option>
                                </select>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6">
                                <div class="product-info-item-title">Nhập giá</div>
                                <input type="text" placeholder="Nhập giá" class="product-info-item-input" name="pro-price">
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6">
                                <div class="product-info-item-title">Nhập số lượng</div>
                                <input type="text" placeholder="Nhập số lượng" class="product-info-item-input" name="pro-quantity">
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-12">
                                <div class="product-info-item-title">Mô tả</div>
                                <textarea type="text" placeholder="Nhập mô tả" class="product-info-item-input" name="pro-description"></textarea>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6">
                                <div class="product-info-item-title">Loại</div>
                                <select class="product-info-item-input" name="pro-type">
                                    <option value="-1">Chọn loại</option>
                                    <?php 
                                        include "../../controllers/typeController.php";
                                        $controller = new TypeController();
                                        $controller->getTypeListManageProduct();
                                    ?>
                                </select>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6">
                                <div class="product-info-item-title">Danh mục</div>
                                <select class="product-info-item-input" name="pro-category">
                                    <option value="-1">Chọn danh mục</option>
                                    <?php 
                                        include "../../controllers/categoryProductController.php";
                                        $controller = new CategoryProductController();
                                        $controller->getCategoryListManageProduct();
                                    ?>
                                    
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
            <input type="text" class="search-input" placeholder="Nhập từ khóa..." name="keyword" onchange="searchProduct(this.value)"/>
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
                    //$controller->getAllProduct();
                    
                    
                    if(isset($_POST['add-submit'])) {
                        $name = $_POST['pro-name'];
                        $colorArr = $_POST['pro-color'];
                        $color = implode(', ', $colorArr);
                        $sizeArr = $_POST['pro-size'];
                        $size = implode(', ', $sizeArr);
                        $price = $_POST['pro-price'];
                        $quantity = $_POST['pro-quantity'];
                        $type = $_POST['pro-type'];
                        $description = $_POST['pro-description'];
                        $categoryId = $_POST['pro-category'];
                        $image01 = $_POST['pro-img-01'];
                        $image02 = $_POST['pro-img-02'];
                        $controller->setProduct($name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02);
                    }
                    
                    if(isset($_POST['edit-submit'])) {
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $name = $_POST['pro-name'];
                            $colorArr = $_POST['pro-color'];
                            $color = implode(', ', $colorArr);
                            $sizeArr = $_POST['pro-size'];
                            $size = implode(', ', $sizeArr);
                            $price = $_POST['pro-price'];
                            $quantity = $_POST['pro-quantity'];
                            $type = $_POST['pro-type'];
                            $description = $_POST['pro-description'];
                            $categoryId = $_POST['pro-category'];
                            $image01 = $_POST['pro-img-01'];
                            $image02 = $_POST['pro-img-02'];
                            $controller->updateProduct($id, $name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02);                        
                        }
                    }
                    

                    if(isset($_GET['action'])) {
                        if($_GET['action'] == 'delete') {
                            if(isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $controller = new ProductController();
                                $controller->deleteProduct($id);
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
                        $controller->getProductByNameLimit($keyword, $limit, $offset);
                    }else {
                        if(isset($_SESSION['keyword'])) {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                unset($_SESSION['keyword']);
                                $_SESSION['keyword'] = $keyword;
                                $controller->getProductByNameLimit($keyword, $limit, $offset);
                            }else {
                                if(isset($_POST['page-submit'])) {
                                    $keyword = $_SESSION['keyword'];
                                    $controller->getProductByNameLimit($keyword, $limit, $offset);
                                }else {
                                    unset($_SESSION['keyword']);
                                    $controller->getAllProductByLimit($limit, $offset);
                                }
                            }
                        }else {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                $_SESSION['keyword'] = $keyword;
                                $controller->getProductByNameLimit($keyword, $limit, $offset);
                            }else {
                                $controller->getAllProductByLimit($limit, $offset);
                            }
                        }
                    }
                    // if($data != NULL) {
                        
                    // }else {
                    //     echo "Không có sản phẩm nào được tìm thấy. Vui lòng thử lại";
                    // }
                    
                ?>
            </tbody>
        </table>
        <div class="page-list">
            <?php
                include_once "../../controllers/productController.php";
                $controller = new ProductController();
                $name = "";
                if(isset($_POST['search-submit'])) {
                    if(isset($_POST['keyword'])) {
                        $name = $_POST['keyword'];
                        $controller->getProductPageByName($name);
                    }
                }else {
                    if(isset($_SESSION['keyword'])) {
                        $name = $_SESSION['keyword'];
                        $controller->getProductPageByName($name);
                    }else {
                        $controller->getAllProductPage();
                    }
                }
            ?>
        </div>
    </div>
</div>