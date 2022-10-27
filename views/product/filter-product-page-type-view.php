<?php 
    if($products != NULL) {
        $currentPage = isset($_GET['current-page'])?$_GET['current-page']:1;
        $limit = 4;
        $offset = ($currentPage - 1) * $limit;
        $totalProducts = count($products);
        $totalPages = ceil($totalProducts / $limit);
        
        if(isset($_GET['category'])){
            for($i = 1; $i <= $totalPages; $i++) {
                if($i != $currentPage){
                    echo "
                        <a href='./index.php?&type=".$type."&current-page=".$i.$querystring ."' class='page-item'>$i</a>
                    ";
                }
                else{
                    echo"
                        <strong style='background-color:black;' class='page-item'>$i</strong>
                    ";
                }
            }                        
        }
        else{
            for($i = 1; $i <= $totalPages; $i++) {
                if($i != $currentPage){
                    echo "
                        <a href='./index.php?&type=".$type."&current-page=".$i."' class='page-item'>$i</a>
                    ";
                }
                else{
                    echo"
                        <strong style='background-color:black;' class='page-item'>$i</strong>
                    ";
                }
            } 
        }
    }   
?>