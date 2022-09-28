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
                if(isset($_SESSION['role'])) {
                    if($_SESSION['role'] === 'R2') {
                        if(isset($_SESSION['firstName']) && isset($_SESSION['lastName']) && isset($_SESSION['image'])) {
                            $firstName = $_SESSION['firstName'];
                            $lastName = $_SESSION['lastName'];
                            $role = $_SESSION['role'];
                            $image = $_SESSION['image'];
                            echo "
                                <div class='admin-info col-4 d-flex'>
                                    <div class='admin-img-container'>
                                        <img src='$image' alt='' class='admin-img'>
                                    </div>
                                    <div class='welcome'>
                                        <div class='user-info'>$firstName $lastName</div>
                                    </div>
                                </div>
                            ";
                        }
                        
                    }
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