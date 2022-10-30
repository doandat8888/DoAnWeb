<?php 
    foreach ($data as $type) {
        //foreach ($genderArr as $key=>$gender) {
            if($type->getId() == $typeProduct) {
                echo "
                    <option value='".$type->getId()."' selected>
                        ".$type->getName()."
                    </option>
                ";
            }else {
                echo "
                    <option value='".$type->getId()."'>
                        ".$type->getName()."
                    </option>   
                ";
            }
        //}
    }
?>