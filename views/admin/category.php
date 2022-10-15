<?php
include_once "../../controllers/categoryProductController.php";
?>
<div class="manage-category">
    <!-- Modal: Thêm danh mục -->
    <form method="post" action="./index.php?page=category">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content col-12 col-sm-12 col-lg-6">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="category-info-list col-12 d-flex">
                            <div class="category-info-item col-12 col-sm-12 col-lg-6">
                                <div class="category-info-item-title">Danh mục</div>
                                <input type="text" name="cat-name" class="category-info-item-input" placeholder="Vui lòng nhập danh mục sản phẩm..."></br>
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

    <div class="title">Quản lí danh mục sản phẩm</div>
    <div class="search-add col-12 d-flex">
        <form class="search col-8" method="post" action="./index.php?page=category">
            <input type="text" class="search-input" placeholder="Nhập từ khóa..." name="keyword" />
            <button type="submit" class="search-btn" name="search-submit">
                <span class="material-symbols-outlined search-icon">
                    search
                </span>
            </button>
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
                    <th scope="col-2">Tên danh mục</th>
                    <th scope="col-3">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once "../../controllers/categoryProductController.php";
                $controller = new CategoryProductController();
                $data = $controller->getCategoryList();
                if(isset($_POST['add-submit'])) {
                    $name = $_POST['cat-name'];
                    $controller = new CategoryProductController();
                    $result = $controller->setCategory($name);
                    if($result === -1) {
                        echo "<script type='text/javascript'>alert('Vui lòng nhập tên danh mục sản phẩm');</script>";
                    }else if($result == 1) {
                        echo "<script type='text/javascript'>alert('Danh mục sản phẩm đã tồn tại');</script>";
                    }else if($result == 0) {
                        echo "<script type='text/javascript'>alert('Thêm danh mục sản phẩm thành công');</script>";
                    }
                }
                if(isset($_POST['edit-submit'])) {
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $name = $_POST['cat-name'];
                        $controller = new CategoryProductController();
                        // $id = $controller->getCategoryByName('cat-name');
                        $result = $controller->editCategory($id, $name);
                        if($result === -1) {
                            echo "<script type='text/javascript'>alert('Vui lòng nhập tên danh mục sản phẩm');</script>";
                        }else if($result == 1) {
                            echo "<script type='text/javascript'>alert('Danh mục sản phẩm đã tồn tại');</script>";
                        }else if($result == 0) {
                            echo "<script type='text/javascript'>alert('Cập nhật danh mục sản phẩm thành công');</script>";
                        }
                    }
                }
                if(isset($_GET['action'])) {
                    if($_GET['action'] == 'delete') {
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $controller = new CategoryProductController();
                            $result = $controller->deleteCategory($id);
                            if($result == true) {
                                echo "<script type='text/javascript'>alert('Xóa danh mục sản phẩm thành công');</script>";
                            }else if($result == false) {
                                echo "<script type='text/javascript'>alert('Có lỗi xảy ra');</script>";
                            }
                        }
                    }
                }
                
                if(isset($_POST['search-submit'])) {
                    if($_POST['keyword'] != '') {
                        $name = $_POST['keyword'];
                        $data = $controller->getCategoryByName($name);
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
                    $data = $controller->getCategoryByNameLimit($keyword, $limit, $offset);
                }else {
                    if(isset($_SESSION['keyword'])) {
                        if(isset($_POST['keyword'])) {
                            $keyword = $_POST['keyword'];
                            unset($_SESSION['keyword']);
                            $_SESSION['keyword'] = $keyword;
                            $data = $controller->getCategoryByNameLimit($keyword, $limit, $offset);
                        }else {
                            if(isset($_POST['page-submit'])) {
                                $keyword = $_SESSION['keyword'];
                                $data = $controller->getCategoryByNameLimit($keyword, $limit, $offset);
                            }else {
                                unset($_SESSION['keyword']);
                                $data = $controller->getAllCategoryByLimit($limit, $offset);
                            }
                        }
                    }else {
                        if(isset($_POST['keyword'])) {
                            $keyword = $_POST['keyword'];
                            $_SESSION['keyword'] = $keyword;
                            $data = $controller->getCategoryByNameLimit($keyword, $limit, $offset);
                        }else {
                            $data = $controller->getAllCategoryByLimit($limit, $offset);
                        }
                    }
                }
                
                if($data != NULL) {
                    foreach ($data as $category) {
                        if($category->getStatus() == 1) {
                            echo "
                                <tr>
                                    <th scope='row'>" . $category->getId() . "</th>
                                    <td>" . $category->getName() . "</td>
                                    <td class='manage-category-action'>
                                        <a href='./index.php?page=updatecategory&id=".$category->getId()."'>
                                            <button class='edit action-btn' data-toggle='modal' data-target='#editModal'>
                                                Sửa
                                            </button>
                                        </a>    
                                        <a href='./index.php?page=category&action=delete&id=".$category->getId()."'>
                                            <button class='delete action-btn' type='submit'>Xóa</button>
                                        </a>
                                    </td>
                                </tr>   
                            ";
                        }
                    }
                } else {
                    echo "Không có danh mục nào được tìm thấy. Vui lòng thử lại";
                }
                ?>
            </tbody>
        </table>

        <!-- pagination -->
        <div class="page-list">
            <?php 
                include_once "../../controllers/categoryProductController.php";
                $controller = new CategoryProductController();
                $categories = NULL;
                $name = "";
                if(isset($_POST['search-submit'])) {
                    if(isset($_POST['keyword'])) {
                        $name = $_POST['keyword'];
                        $products = $controller->getCategoryByName($name);
                    }
                }else {
                    if(isset($_SESSION['keyword'])) {
                        $name = $_SESSION['keyword'];
                        $products = $controller->getCategoryByName($name);
                    }else {
                        $products = $controller->getCategoryList();
                    }
                }
                $currentPage = 1;
                if(isset($_GET['current-page'])) {
                    $currentPage = $_GET['current-page'];
                }
                $limit = 4;
                $offset = ($currentPage - 1) * $limit;
                $totalPages = 0;
                if($products != NULL) {
                    $totalProducts = count($products);
                    $totalPages = ceil($totalProducts / $limit);
                    for($i = 1; $i <= $totalPages; $i++) {
                        echo "
                            <form method='post' action='./index.php?page=category'>
                                <button class='page-item' name='page-submit' type='submit' value='".$i."'>$i</button>
                            </form>
                        ";
                    }
                }           
            ?>
        </div>
    </div>
</div>

<!-- Script search-->
<script>
    function searchProduct(keyword) {
        if(keyword != '') {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    document.getElementById("manage-category-body").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "./product-search.php?keyword=" + keyword, true);
            xmlhttp.send();
        }
    }
</script>