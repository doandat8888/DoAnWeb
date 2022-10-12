<?php 
    
    $filepath = realpath(dirname(__FILE__));
    include ($filepath. '/../modules/db_module.php');
    include ($filepath. '/./product.php');
    include ($filepath. '/../validate_module.php');
    
    class ProductModel {
        public function getAllProduct() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `status` = 1";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getAllProductByLimit($limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
        public function setProduct($name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            if(existsNameProduct($link, $name)) {
                giaiPhongBoNho($link, true);
                $result = false;
            }else {
                $query = "INSERT INTO `products` (`name`, `color`, `size`, `price`, `quantity`, `type`, `description`, `category_id`, `image01`, `image02`, `status`) VALUES ('$name', '$color', '$size', '$price', '$quantity', '$type', '$description', '$categoryId', '$image01', '$image02', 1)";
                $setuser = chayTruyVanKhongTraVeDL($link, $query);
                if($setuser) {
                    $result = true;
                }
            }
            return $result;
        }  

        public function getProductByType($type) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `type` = '$type'";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        } 

        public function getProductByTypeLimit($type, $limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `type` = '$type' ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        } 

        public function getProductByName($searchstr){
            $result = null;
            $link = null;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * FROM products WHERE `name` LIKE '%$searchstr%'";
            $result = chayTruyVanTraVeDL($link, $query);
            if (mysqli_num_rows($result) > 0){
                while ($rows = mysqli_fetch_assoc($result)){
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }
            else {
                $data = null;
            }
            return $data;
        }

        public function getProductByNameLimit($name, $limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `name` LIKE '%$name%' ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        } 

        public function getProductById($id) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `id` = $id";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function deleteProduct($id) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "UPDATE products SET `status`= 0 WHERE `id` = $id";
            $deleteuser = chayTruyVanKhongTraVeDL($link, $query);
            if($deleteuser) {
                $result = true;
            }else {
                $result = false;
            }
            return $result;
        }

        public function updateProduct($id, $name, $color, $size, $price, $quantity, $type, $description, $categoryId, $image01, $image02) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "UPDATE products SET `name`= '$name', `color` = '$color', `size` = '$size', `price` = '$price', `quantity` = $quantity, `type` = $type, `description` = '$description', category_id = $categoryId, image01 = '$image01', image02 = '$image02' WHERE `id` = $id";
            $updateProduct = chayTruyVanKhongTraVeDL($link, $query);
            if($updateProduct) {
                $result = true;
            }else {
                $result = false;
            }
            return $result;
        }

        public function filterProduct() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `status` = 1 ";
            if(isset($_POST['minimumPrice']) && isset($_POST['maximumPrice'])) {
                $minimumPrice = $_POST['minimumPrice'];
                $maximumPrice = $_POST['maximumPrice'];
                $query .= "AND price BETWEEN $minimumPrice AND $maximumPrice ";
            }
            if(isset($_POST['size'])) {
                $size = $_POST['size'];
                $size_filter = implode(", ", $size);
                $query .= "AND size LIKE '%$size_filter%' ";
            }

            if(isset($_POST['color'])) {
                $color = $_POST['color'];
                $color_filter = implode(", ", $color);
                $query .= "AND color LIKE '%$color_filter%' ";
            }

            if(isset($_POST['category'])) {
                $categoryId = $_POST['category'];
                $category_filter = implode("','", $categoryId);
                $query .= "AND category_id IN ('".$category_filter."') ";
            }

            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function filterProductLimit($limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products ";
            if(isset($_POST['size'])) {
                $size = $_POST['size'];
                $size_filter = implode("','", $size);
                $query .= "AND `size` IN ('".$size_filter."') ";
            }

            $query .= "ORDER BY `id` ASC limit $limit OFFSET $offset";

            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["color"], $rows["size"], $rows["price"], $rows["quantity"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }    
?>

