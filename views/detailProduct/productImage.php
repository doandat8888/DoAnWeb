<?php 
    foreach ($data as $product) {
        echo "
            <img id='ProductImg' width='100%' src='".$product->getImage01()."' alt=''>
            <div class='img-icon'>
                <img src='".$product->getImage01()."' alt='' class='small-img'>
                <img src='".$product->getImage02()."' alt='' class='small-img'>
                <img src='".$product->getImage01()."' alt='' class='small-img'>
                <img src='".$product->getImage02()."' alt='' class='small-img'>
            </div>
        ";
    }
?>