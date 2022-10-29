<?php 
    foreach ($data as $type) {
        if($type->getStatus() == 1) {
            $typeName = $type->getName();
            echo "
                <option value='".$type->getId()."'>$typeName</option>
            ";
        }
    }
?>