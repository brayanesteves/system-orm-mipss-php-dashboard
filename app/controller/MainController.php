<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 28/09/2021
     * Time: 05:05 PM  
     */
    use View\Views;
    use App\model\Usr;
    use \libs\ORM\EtORM;
    class MainController {
        public function index() {
            return Views::create("index");
        }
    }
?>