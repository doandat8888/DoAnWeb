<?php
include_once "../../controllers/categoryProductController.php";
?>
<div class="manage-category">
    <!-- Modal: Thêm danh mục -->
    <form method="post" action="./index.php?page=category">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="category-info-list col-12 d-flex">
                            <div class="category-info-item col-6">
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
    <!-- Modal: Cập nhật danh mục -->
    <form method="post" action="./index.php?page=category">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cập nhật danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="category-info-list col-12 d-flex">
                            <div class="category-info-item col-6">
                                <div class="category-info-item-title">Danh mục</div>
                                <input type="text" name="cat-name" class="category-info-item-input" placeholder="Vui lòng nhập danh mục sản phẩm..."></br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" name="edit-submit">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="title">Quản lí danh mục sản phẩm</div>
    <div class="search-add col-12 d-flex">
        <form class="search col-8" method="post" action="./category.php">
            <input type="text" class="search-input" placeholder="Nhập từ khóa..." name="keyword" />
            <button type="submit" class="search-btn" name="search-submit">
                <span class="material-symbols-outlined search-icon">
                    search
                </span>
            </button>
        </form>
        <button class="add-btn col-2" data-toggle="modal" data-target="#exampleModal">
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
                if(isset($_POST['search-submit'])) {
                    if($_POST['keyword'] != '') {
                        $name = $_POST['keyword'];
                        $data = $controller->getCategoryByName($name);
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
                if(isset($_POST['edit-submit'])) {
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $name = $_POST['cat-name'];
                        $controller = new CategoryProductController();
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
                
                foreach ($data as $category) {
                    if($category->getStatus() == 1) {
                        echo "
                            <tr>
                                <th scope='row'>" . $category->getId() . "</th>
                                <td>" . $category->getName() . "</td>
                                <td class='manage-product-action'>
                                    <a href='./index.php?page=category&action=edit&id=".$category->getId()."'>
                                        <button class='edit' data-toggle='modal' data-target='#editModal'>
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
                ?>
            </tbody>
        </table>
    </div>
</div>