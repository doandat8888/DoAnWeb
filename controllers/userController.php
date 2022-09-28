<?php 
    //session_start();
    include "../../models/userModel.php";
?>

<?php 
    class UserController {
        public $model;
        public function __construct() {
            $this->model = new UserModel();
        }
        public function getUser() {
            $data = $this->model->getUser();
            if($data!=NULL) {
                foreach($data as $user) {
                    $_SESSION['role'] = $user->getRole();
                }
                if(isset($_SESSION['role'])) {
                    $role = $_SESSION['role'];
                    if($role === 'R1') {
                        header("Location: ../../index.php");
                    }else if($role === 'R2') {
                        header("Location: ../admin/index.php");
                    }
                }
            }else {
                header('Location: ../../views/login/index.php?msg=login-fail');
            }
        }
    }
?>