
<?php
// class productModel{
//     var $prod_id;
// 	var $prod_name;
// 	var $prod_color;
// 	var $prod_size;
// 	var $category_quantity;
//     var $prod_price;
// 	var $category_id;
// 	var $prod_description;
// 	var $prod_image;
// 	var $status;
//     //chưa update csdl ???

//     public function getId(){
//         return $this->prod_id;
//     }
//     public function getName(){
//         return $this->prod_name;
//     }
//     public function getColor(){
//         return $this->prod_color;
//     }
//     public function getSize(){
//         return $this->prod_size;
//     }
//     public function getQuantity(){
//         return $this->prod_quantity;
//     }
//     public function getPrice(){
//         return $this->prod_price;
//     }
//     public function getIdCategory(){
//         return $this->category_id;
//     }
//     public function getDes(){
//         return $this->prod_description;
//     }
//     public function getIdImage(){
//         return $this->prod_image;
//     }
//     public function getStatus(){
//         return $this->status;
//     }
    
//     public function __contruct($prod_id,$prod_name,$prod_color,$prod_size,$prod_quantity,$prod_price,$category_id,$prod_description,$prod_image,$status)
//     {
//                 $this->prod_id = $prod_id;
//                 $this->prod_name = $prod_name;
//                 $this->prod_color = $prod_color;
//                 $this->prod_size = $prod_size;
//                 $this->prod_quantity = $prod_quantity;
//                 $this->prod_price = $prod_price;
//                 $this->category_id = $category_id;
//                 $this->prod_description = $prod_description;
//                 $this->prod_image_id = $prod_image;
//                 $this->status = $status;
//     }

//     public function getProductList()
//     {
//         $link = null;
//         taoKetNoi($link);
//         $result = chayTruyVanTraVeDL($link,"select * from products");
//         $data = $result;
//         giaiPhongBoNho($link,$result);
//         return $data;
//     }

//     public function getProduct($id)
//     {   
//         $allProduct = $this->getProductList();
//         foreach($allProduct as $prod){
//             if ($prod->getId()===$id) {
//                 return $prod;
//             }
//         }
//         return null;
//     }
// }
?>
<?php 
    // session_start();
    include_once "../../modules/db_module.php";
    include_once "../../models/product.php";
    include_once "../../validate_module.php";

    class ProductModel {
        public function getAllProduct() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products";
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
    }    
?>

