<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 28/09/2021
     * Time: 08:39 PM  
     */
    use View\Views;
    use App\model\Usr;
    use \libs\ORM\EtORM;
    class UsersController {

        public function index() { 
            $users = Usr::all();
            return Views::create("admin.users.list", array("users" => $users));        
        }
        public function search() {            
        }
        public function insert() {            
        }    

    }
?>