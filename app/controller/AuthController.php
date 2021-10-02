<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 01/10/2021
     * Time: 14:00  
     */
    use View\Views;
    use App\model\Usr;
    use \libs\ORM\EtORM;
    class AuthController {
        public function index() {
            return Views::create("auth.login");
        }

        public function signin() {    
            if(validate_csrf()) {
                echo "OK";
            } else {
                echo "¡ERROR!";
            }     
        }
    }
?>