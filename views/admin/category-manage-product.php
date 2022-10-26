<?php 
    foreach ($data as $category) {
        if($category->getStatus() == 1) {
            $categoryName = $category->getName();
            echo "
                <option value='".$category->getId()."'>$categoryName</option>
            ";
        }
    }
?>