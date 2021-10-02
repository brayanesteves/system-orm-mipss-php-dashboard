<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 02/10/2021
     * Time: 13:31  
     */
    use View\Views;
    use App\model\Usr;
    use \libs\ORM\EtORM;
    class AdminController {
        public function index() {
            return Views::create("admin.index");
        }
    }
?>