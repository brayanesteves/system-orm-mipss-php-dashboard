<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 02/10/2021
     * Time: 11:29 
     */
    use View\Views;
    use App\model\Usr;
    use App\model\Prdcts;
    use \libs\ORM\EtORM;
    class ProductController {

        public function index() { 
   
        }
        
        public function new() {
            return Views::create("admin.product.add");
        }
        
        public function add() {
            try {
                if(!empty($_POST)) {
                    $product               = new Prdcts();
                    if(isset($_POST["Rfrnc"])) {
                        $product           = Prdcts::find(input("Rfrnc"));
                    }
                    $product->Nm             = input("Nm");                
                    $product->CncptDscrptn   = input("CncptDscrptn");
                    $product->Rfrnc_TypPrdct = input("Rfrnc_TypPrdct");
                    $product->Cndtn          = 1;
                    $product->Rmvd           = 0;  
                    $product->Lckd           = 0;                   
                    $product->DtAdmssn       = Date("Y-m-d");
                    $product->ChckTm         = Date("H:i:s"); 
                    if($product->save()) {
                        redirecting()->to("/products");
                    } else {
                        echo "ERROR";
                    }
                }                

            } catch (Exception $e) {
                echo $e->getMessage();
            }
            redirecting()->to("/products");
        }

        /**
         * Method to edit record
         * Example: 
         * http://localhost/system-orm-mipss-php-dashboard/product/edit/{$Reference}
         * @param {int} $Reference
         * @return redirect
         */
        public function edit($Reference) {
            $product = Prdcts::find($Reference);
            if(count($product)) {
                return Views::create("admin.product.add", array("product" => $product));
            }
            return redirecting()->to("product");
        }

        public function delete($Reference) {
            $product = Prdcts::find($Reference);
            if(count($product)) {
                $product->delete();
                return redirecting()->to("products");
            }
            return redirecting()->to("products");
        }

        public function remove($Reference) {
            $product = Prdcts::find($Reference);
            var_dump($product);
            if(count($product)) {
                $product->remove();
                return redirecting()->to("products");
            }
            return redirecting()->to("products");
        }

        /**
         * JSON
         * http://localhost/system-orm-mipss-php-dashboard/product/all
         */
        public function all() {
            $products = Prdcts::all();
            echo json_response($products);
        }
        public function insert() {            
        }        
    }
?>