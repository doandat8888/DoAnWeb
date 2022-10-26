<?php 
    if($data != NULL) {
        foreach ($data as $category) {
            if($category->getStatus() == 1) {
                echo "
                    <tr>
                        <th scope='row'>" . $category->getId() . "</th>
                        <td>" . $category->getName() . "</td>
                        <td class='manage-category-action'>
                            <a href='./index.php?page=update-category&id=".$category->getId()."'>
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