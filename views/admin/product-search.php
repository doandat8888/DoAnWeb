


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
                if(isset($_GET['keyword'])) {
                    $keyword = $_GET['keyword'];
                    include "../../controllers/productController.php";
                    $controller = new ProductController();
                    $data = $controller->getProductByName($keyword);
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
                }
            ?>
        </tbody>
    </table>

    
