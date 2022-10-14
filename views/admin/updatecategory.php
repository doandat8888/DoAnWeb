<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/updateProduct.css">
    <title>Update Category</title>
</head>

<body>
    <?php
    include_once "../../controllers/categoryProductController.php";
    $controller = new CategoryProductController();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $categories = $controller->getCategoryById($id);
        foreach ($categories as $category) {
            echo "
                <form method='post' action='./index.php?page=category&id=".$category->getId()."'>
                    <div class='category-info-list col-12 d-flex'>
                        <div class='category-info-item col-6'>
                            <div class='category-info-item-title'>Tên danh mục</div>
                            <input type='text' class='category-info-item-input' name='cate-name' value = '" . $category->getName() . "' />
                        </div>
                    </div>
                    <div class='footer'>
                        <button class='edit action-btn' type='submit' name='edit-submit'>
                            Cập nhật
                        </button>
                        <a href='./index.php?page=category'>
                            <button class='previous action-btn' type='submit'>Trở lại</button>
                        </a>
                    </div>
                </form>
                ";
        }
    }
    ?>
</body>

</html>