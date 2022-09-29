<?php
include_once("db_module.php");
if(isset($_POST['categoryname'])) {
    $link = NULL;
    taoKetNoi($link);
    $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO categories
                                            VALUE (NULL, '".$_POST['categories']."')");
    giaiPhongBoNho($link, NULL);
    if($result) {
        header("Location: ../../category.php?msg=done");
    } 
    else {
        header("Location: ../../category.php?msg=error");
    }
}
else {
    header("Location: ../../category.php");
}

include_once ("categoryProductModel")

?>