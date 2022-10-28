<!-- PHÂN TRANG NẾU CÓ TYPE -->

<?php 
    if($products != NULL) {
        $currentPage = isset($_GET['current-page'])?$_GET['current-page']:1;
        $limit = 4;
        $offset = ($currentPage - 1) * $limit;
        $totalProducts = count($products);
        $totalPages = ceil($totalProducts / $limit);

        //In nếu có lọc
        if(isset($_GET['category']) || isset($_GET['input-min']) || isset($_GET['input-max'])){
            for($i = 1; $i <= $totalPages; $i++) {
                if($i != $currentPage){
                    echo "
                        <a href='./index.php?type=".$type."&current-page=".$i.$_SESSION['querystring'] ."' class='page-item'>$i</a>
                    ";
                }
                else{
                    echo"
                        <strong style='color:black; text-decoration:underline;' class='page-item'>$i</strong>
                    ";
                }
            }
            unset($_SESSION['querystring']);       
        }
        else{ //In nếu ko có lọc
            for($i = 1; $i <= $totalPages; $i++) {
                if($i != $currentPage){
                    echo "
                        <a href='./index.php?type=".$type."&current-page=".$i."' class='page-item'>$i</a>
                    ";
                }
                else{
                    echo"
                        <strong style='color:black; text-decoration:underline;' class='page-item'>$i</strong>
                    ";
                }
            } 
        }
    }   
?>