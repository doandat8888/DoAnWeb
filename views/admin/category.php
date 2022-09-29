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
    else {
        "<div style='color: white;
                    background-color: red;
                    padding: 5px;'
        > Thêm thất bại !
        </div>";
    }
}
// require_once ("db_module.php")
?>
<div class="manage-category">
    <div class="title">Quản lý danh mục sản phẩm</div>
    <div class="manage-category-body">
        <form action="#" method="post">
            <label for="categoryname">Danh mục</label>
            <input type="text" name="categoryname"></br>
            <input type="submit" value="Thêm Danh Mục">
            <input type="reset" value="Làm mới">
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