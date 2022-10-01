<div class="manage-product">
    <!-- Modal -->
    <form method="post" action="./manage-product.php">
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
                    $controller = new ProductController();
                    $data = $controller->setProduct($name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02);
                }
                foreach ($data as $product) {
                    if($product->getStatus() == 1) {
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
                }
                ?>
            </tbody>
        </table>
    </div>
</div>