<div class="col-lg-9 col-12 pages">
    <div class="pages-header">
        <div class="row">
            <span class="material-symbols-outlined pages-header-icon col-3">
                reorder
            </span>
            <div class="pages-header-search col-5">
                <input type="text" placeholder="Bạn tìm gì..." class="pages-header-search-input">
            </div>
            <?php 
                include_once "../../controllers/userController.php";
                $controler = new UserController();
                $username = $_SESSION['username'];
                $password = $_SESSION['password'];
                $data = $controler->getInfoUser($username, $password);
                foreach($data as $user) {
                    echo "
                        <div class='admin-info col-4 d-flex'>
                            <div class='admin-img-container'>
                                <img src='".$user->getImage()."' alt='' class='admin-img'>
                            </div>
                            <div class='welcome'>
                                <div class='user-info'>".$user->getFirstName()." ".$user->getLastName()."</div>
                            </div>
                        </div>
                    ";
                }
            ?>
            
        </div>
        
    </div>
    <?php 
        if(isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'dashboard':
                    include_once "dashboard.php";
                    break;
                case 'category':
                    include_once "category.php";
                    break;
                case 'manage-product':
                    include_once "manage-product.php";
                    break;
                case 'manage-customer':
                    include_once "manage-customer.php";
                    break;
                case 'statistic':
                    include_once "statistic.php";
                    break;
                case 'bill':
                    include_once "bill.php";
                    break;
                default:
                    include_once "dashboard.php";
                    break;
            }
        }else {
            include_once "dashboard.php";
        }
    ?>
</div>