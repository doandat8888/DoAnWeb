<?php 
    foreach ($data as $category) {
        echo "
            <form method='post' action='./index.php?page=category&id=".$category->getId()."'>
                <div class='category-info-list col-12 d-flex'>
                    <div class='category-info-item col-6'>
                        <div class='category-info-item-title'>Tên danh mục</div>
                        <input type='text' class='category-info-item-input' name='cat-name' value = '" . $category->getName() . "' />
                    </div>
                </div>
                <div class='footer'>
                    <button class='edit action-btn' type='submit' name='edit-submit'>
                        Cập nhật
                    </button>
                    <a href='./index.php?page=category'>
                        <button class='previous action-btn' type='submit'>Trở lại</button>
                    </a>
                </div>
            </form>
            ";
    }
?>