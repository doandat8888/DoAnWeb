<?php 
    foreach($data as $category) {
        if($category->getStatus() == 1) {
            $categoryName = $category->getName();
            if($categoryName != $nameSelected) {
                echo "
                    <option value='".$category->getId()."'>$categoryName</option>
                ";
            }else {
                echo "
                    <option value='".$category->getId()."' selected>$categoryName</option>
                ";
            }
        }
    }
?>