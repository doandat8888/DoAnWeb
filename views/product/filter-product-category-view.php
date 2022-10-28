<?php 
    foreach($data as $category) {
        if($category->getStatus() == 1) {
            echo "
                <div class='filter-item'>
                    <input name='category[]' type='checkbox' class='filter-item-check pro-category' value='".$category->getId()."' /> ".$category->getName()."
                </div>
            ";
        }
    }
?>