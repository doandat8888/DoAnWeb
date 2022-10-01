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
$category = new CategoryProductController();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryname = $_POST['categoryname'];
    $addcategory = $category->addNewCategory($categoryname);
}
?>
<div class="manage-category">
    <div class="title">
        Quản lý danh mục sản phẩm
    </div>
    <!-- Thêm danh mục sản phẩm -->
    <div class="manage-category-body">
        <h3>Thêm danh mục</h3>
        <form action="#" method="post">
            <label for="categoryname">Danh mục</label>
            <input type="text" name="categoryname"></br>
            <input type="submit" value="Thêm Danh Mục">
            <input type="reset" value="Làm mới">
            <?php
            if(isset($addcategory)) {
                echo $addcategory;
            }
            ?>
        </form>
        <h3>Thêm sản phẩm vào danh mục</h3>
        <form action="#" method="post">
            <label for="categoryid">Chọn Danh Mục:</label>
            <select name="categoryid">
                <?php
                    
                ?>
            </select>
        </form>
        <table class="manage-category-table table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col-1">STT</th>
                    <th scope="col-2">ID</th>
                    <th scope="col-4">Tên Danh Mục</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //code
                ?>
            </tbody>
        </table>

    </div>
</div>