<?php 
    if($data != NULL) {
        foreach ($data as $product) {
            if($product->getStatus() == 1) {
                echo "
                    <tr>
                        <th scope='row'>" . $product->getId() . "</th>
                        <td class='product-img-container col-2'><img src='" . $product->getImage01() . "' class='manage-product-img col-lg-6'></td>
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
    }else {
        echo "Không có sản phẩm nào được tìm thấy. Vui lòng thử lại";
    }   
?>
