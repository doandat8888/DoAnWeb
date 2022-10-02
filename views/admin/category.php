<?php 
if(isset($_GET['msg'])) {
    if($_GET['msg'] == "done") {
        echo
        "<div style='color: white;
                    background-color: green;
                    padding: 5px;'
        > Thêm thành công !
        </div>";
    }
    else if($_GET['msg'] == "error"){
        echo
        "<div style='color: white;
                    background-color: red;
                    padding: 5px;'
        > Thêm thất bại !
        </div>";
    }else {
        echo
        "<div style='color: white;
                    background-color: yellow;
                    padding: 5px;'
        > Chưa đủ thông tin cần thiết !
        </div>";
    }
}
?>
<?php
include_once "../../controllers/categoryProductController.php";
?>
<div class="manage-category">
    <!-- Modal -->
    <form method="post" action="./category.php">
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
                        <button type="reset" class="btn btn-primary" name="reset-submit">Làm mới</button>

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
                    $data = $controller->addNewCategory($name);
                }
                if(isset($_POST['search-submit'])) {
                    if($_POST['keyword'] != '') {
                        $name = $_POST['keyword'];
                        $data = $controller->getCategoryByName($name);
                    }
                }
                foreach ($data as $category) {
                    if($category->getStatus() == 1) {
                        echo "
                            <tr>
                                <th scope='row'>" . $category->getId() . "</th>
                                <td>" . $category->getName() . "</td>
                                <td class='manage-product-action'>
                                    <button class='edit action-btn'>
                                        Sửa
                                    </button>
                                    <button class='delete action-btn'>Xóa</button>
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