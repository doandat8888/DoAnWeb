<?php 
    foreach ($data as $product) {
        echo '
            <nav class ="row d-sm-none d-md-block" aria-label ="breadcrumb">
                <ol class ="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../../index.php" class="breadcrumb-item-link">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        '.$product->getName().'
                    </li>
                </ol>
            </nav>
        ';
    }
?>