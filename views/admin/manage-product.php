<div class="manage-product">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="product-name col-6">
                        <div class="product-name-title">Tên sản phẩm</div>
                        <input type="text" placeholder="Nhập tên sản phẩm" class="product-name-input">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="title">Quản lí sản phẩm</div>
    <div class="search-add col-12 d-flex">
        <div class="search col-8">
            <input type="text" class="search-input" placeholder="Nhập từ khóa..." name="keyword" />
            <span class="material-symbols-outlined search-icon">
                search
            </span>
        </div>
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
                    <th scope="col-1">STT</th>
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
                foreach ($data as $product) {
                    echo "
                            <tr>
                                <th scope='row'>" . $product->getId() . "</th>
                                <td class='product-img-container col-2'><img src='" . $product->getImage01() . "' class='manage-product-img col-lg-6 col-12'></td>
                                <td>" . $product->getName() . "</td>
                                <td>" . $product->getPrice() . "</td>
                                <td class='manage-product-action'>
                                    <button class='edit action-btn'>
                                        Sửa
                                    </button>
                                    <button class='delete action-btn'>Xóa</button>
                                </td>
                            </tr>   
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>