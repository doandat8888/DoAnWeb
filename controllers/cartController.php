<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/userModel.php');
    include_once ($filepath. '/../models/productModel.php');
    include_once ($filepath. '/../models/categoryProductModel.php');

class CartController
{
    public $model;
    public $model1;
    public $model2;
    public function __construct()
    {
        $this->model = new UserModel();
        $this->model1 = new ProductModel();
        $this->model2 = new CategoryProductModel();
    }

    function addProductToCart($prod_id)
    {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $prod = $this->model1->getProductById($prod_id);
        switch (isset($_POST[''])) {
            case 'addToCart':
                $pricetotal = $_POST['prod_quantity'] * $prod[0]['price'];

                $product = array(
                    "prod_id" => $prod[0]['id'], 
                    "prod_name" => $prod[0]['name'], 
                    "prod_img" => $prod[0]['image01'],
                    "prod_size" => $_POST['prod_size'], 
                    "prod_color" => $_POST['prod_color'], 
                    "prod_price" => $prod[0]['price'],
                    "prod_qty_max" => $prod[0]['quantity'], 
                    "prod_qty_cart" => $_POST['prod_quantity'], 
                    "pricetotal" => $pricetotal
                );

                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];

                    if (!array_key_exists($product["prod_id"], $cart)) {
                        $cart[$product["prod_id"]] = $product;
                    } else {
                        $temp = $cart[$product["prod_id"]]['prod_qty_cart'] + $product['prod_qty_cart'];
                        if ($temp > $product['prod_qty_max']) {
                            $cart[$product["prod_id"]]['prod_qty_cart'] = $product['prod_qty_max'];
                            $cart[$product["prod_id"]]['pricetotal'] = $cart[$product["prod_id"]]['prod_qty_cart'] * $cart[$product['prod_id']]['prod_price'];
                        } else {
                            $cart[$product["prod_id"]]['prod_qty_cart'] = $temp;
                            $cart[$product["prod_id"]]['pricetotal'] = $cart[$product["prod_id"]]['prod_qty_cart'] * $cart[$product['prod_id']]['prod_price'];
                        }
                    }
                    $_SESSION['cart'] = $cart;
                    $this->createPriceTotal();
                } else {
                    $cart[$product["prod_id"]] = $product;
                    $_SESSION['cart'] = $cart;
                    $this->createPriceTotal();
                }
                $this->createPriceTotal();
                header('location: ../views/cart/index.php');
                break;
            case 'buyNow':
                $pricetotal = $_POST['prod_quantity'] * $prod[0]['price'];

                $product = array(
                    "prod_id" => $prod[0]['id'], 
                    "prod_name" => $prod[0]['name'], 
                    "prod_img" => $prod[0]['image01'],
                    "prod_size" => $_POST['prod_size'], 
                    "prod_color" => $_POST['prod_color'], 
                    "prod_price" => $prod[0]['price'],
                    "prod_qty_max" => $prod[0]['quantity'], 
                    "prod_qty_cart" => $_POST['prod_quantity'], 
                    "pricetotal" => $pricetotal
                );

                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];

                    if (!array_key_exists($product["prod_id"], $cart)) {
                        $cart[$product["prod_id"]] = $product;
                    } else {
                        $temp = $cart[$product["prod_id"]]['prod_qty_cart'] + $product['prod_qty_cart'];
                        if ($temp > $product['prod_qty_max']) {
                            $cart[$product["prod_id"]]['prod_qty_cart'] = $product['prod_qty_max'];
                            $cart[$product["prod_id"]]['pricetotal'] = $cart[$product["prod_id"]]['prod_qty_cart'] * $cart[$product['prod_id']]['prod_price'];
                        } else {
                            $cart[$product["prod_id"]]['prod_qty_cart'] = $temp;
                            $cart[$product["prod_id"]]['pricetotal'] = $cart[$product["prod_id"]]['prod_qty_cart'] * $cart[$product['prod_id']]['prod_price'];
                        }
                    }
                    $_SESSION['cart'] = $cart;
                    $this->createPriceTotal();
                } else {
                    $cart[$product["prod_id"]] = $product;
                    $_SESSION['cart'] = $cart;
                    $this->createPriceTotal();
                }
                $this->createPriceTotal();
                header('location: ../views/cart/index.php');
                break;
            default:
                // header('location: ./views/detailProduct/index.php');
                break;
        }
    }

    public function actionCart()
    {
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'Remove':
                    $this->removeProduct($_POST['prod_id']);
                    header('location: ../views/cart/index.php');
                    break;

                case 'Empty cart':
                    $this->emptyCart();
                    header('location: ../views/cart/index.php');
                    break;

                case 'Update cart':
                    $this->updateProduct($_POST['prod_id'], $_POST['prod_quantity_up']);
                    header('location: ../views/cart/index.php');
                    break;

                default:
                    break;
            }
        }
    }

    function removeProduct($key)
    {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            for ($i = 0; $i < count($cart); $i++) {
                unset($cart[$key[$i]]);
            }
            $_SESSION['cart'] = $cart;
            $this->createPriceTotal();
        }
    }

    function updateProduct($id, $quan)
    {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            for ($i = 0; $i < count($cart); $i++) {
                $cart[$id[$i]]['prod_qty_cart'] =  $quan[$i];
                $cart[$id[$i]]['pricetotal'] = $cart[$id[$i]]['prod_qty_cart'] * $cart[$id[$i]]['prod_price'];
            }
            $_SESSION['cart'] = $cart;
            $this->createPriceTotal();
        }
    }

    function checkoutCart($key)
    {
        $sum = 0;
        $cart = $_SESSION['cart'];
        foreach ($cart as $v)
            $sum += $v[$key]['prod_quantity'] * $v[$key]['prod_price'];
        return $sum;
    }

    function emptyCart()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }

    function createPriceTotal()
    {
        if (isset($_SESSION['cart'])) {
            $pricetotal = 0;
            foreach ($_SESSION['cart'] as $value) {
                $pricetotal += $value['pricetotal'];
            }
            $_SESSION['total'] = $pricetotal;
        }
    }
}
