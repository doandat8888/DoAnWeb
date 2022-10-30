<?php 
    foreach ($data as $type) {
        if($type->getStatus() == 1) {
            $typeName = $type->getName();
            echo " 
                <li class='nav-item'>
                    <a href='../../views/product/index.php?type=".$type->getId()."' class='nav-item-link'>
                        $typeName
                    </a>
                </li>
            ";
        }
    }
?>