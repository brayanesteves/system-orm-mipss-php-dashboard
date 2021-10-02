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
            return Views::create("index");
        }
    }
?>