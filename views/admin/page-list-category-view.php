<?php 
    $currentPage = 1;
    if(isset($_GET['current-page'])) {
        $currentPage = $_GET['current-page'];
    }
    $limit = 4;
    $offset = ($currentPage - 1) * $limit;
    $totalPages = 0;
    if($data != NULL) {
        $totalProducts = count($data);
        $totalPages = ceil($totalProducts / $limit);
        for($i = 1; $i <= $totalPages; $i++) {
            echo "
                <form method='post' action='./index.php?page=category'>
                    <button class='page-item' name='page-submit' type='submit' value='".$i."'>$i</button>
                </form>
            ";
        }
    }
?>

