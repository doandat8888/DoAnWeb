<table class="manage-category-table table">
    <thead class="thead-dark">
        <tr>
            <th scope="col-1">ID</th>
            <th scope="col-2">Tên danh mục</th>
            <th scope="col-3">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if(isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                include_once "../../controllers/categoryProductController.php";
                $controller = new CategoryProductController();
                $data = $controller->getCategoryByName($keyword);
                foreach ($data as $category) {
                    if($category->getStatus() == 1) {
                        echo "
                            <tr>
                                <th scope='row'>" . $category->getId() . "</th>
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
            }
        ?>
    </tbody>
</table>