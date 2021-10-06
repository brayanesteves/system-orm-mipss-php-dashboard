<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 02/10/2021
     * Time: 11:29 
     */
    use View\Views;
    use App\model\Prdcts;
    use \libs\ORM\EtORM;
    class ProductsController {

        public function index() { 
            $products = Prdcts::all();
            return Views::create("admin.products.list", array("products" => $products));        
        }
        public function search() {            
        }
        public function insert() {            
        }  
    }
?>