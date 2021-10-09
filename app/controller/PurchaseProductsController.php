<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 07/10/2021
     * Time: 11:39
     */
    use View\Views;
    use \libs\ORM\EtORM;
    class PurchaseProductsController {
        public function index() {
            return Views::create("admin.purchases.index");
        }
    }
?>