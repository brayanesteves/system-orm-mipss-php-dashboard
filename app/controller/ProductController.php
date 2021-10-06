<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 02/10/2021
     * Time: 11:29 
     */
    use View\Views;
    use App\model\Usr;
    use \libs\ORM\EtORM;
    class ProductController {

        public function index() { 
   
        }
        
        public function new() {
            return Views::create("admin.user.add");
        }
        
        public function add() {
            try {
                $user               = new Usr();
                if(input("username")) {
                    $user           = Usr::find(input("reference"));
                }
                $user->Usrnm        = input("username");
                if(input("password")) {
                    $user->Psswrd       = crypt(input("password"), '$2a$07$usesomesillystringforsalt$');
                }
                $user->Rfrnc_Prsn   = input("Rfrnc_Prsn");
                $user->UsrTyp_Rfrnc = input("UsrTyp_Rfrnc");
                if(isset($_POST["Cndtn"])) {
                    $user->Cndtn    = 1;
                } else {
                    $user->Cndtn    = 0;
                }
                if(isset($_POST["Rmvd"]) == "on") {
                    $user->Rmvd        = 1;
                } else {
                    $user->Rmvd        = 0;
                }
                if(isset($_POST["Lckd"]) == "on") {
                    $user->Lckd        = 1;
                } else {
                    $user->Lckd        = 0;
                } 
                $user->DtAdmssn     = Date("Y-m-d");
                $user->ChckTm       = Date("H:i:s"); 
                $user->save(); 
                
                redirecting()->to("/users");

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        /**
         * Method to edit record
         * Example: 
         * http://localhost/system-orm-mipss-php-dashboard/user/edit/{$Reference}
         * @param {int} $Reference
         * @return redirect
         */
        public function edit($Reference) {
            $user = Usr::find($Reference);
            if(count($user)) {
                return Views::create("admin.user.add", array("user" => $user));
            }
            return redirecting()->to("user");
        }

        public function delete($Reference) {
            $user = Usr::find($Reference);
            if(count($user)) {
                $user->delete();
                return redirecting()->to("users");
            }
            return redirecting()->to("users");
        }

        public function remove($Reference) {
            $user = Usr::find($Reference);
            var_dump($user);
            if(count($user)) {
                $user->remove();
                return redirecting()->to("users");
            }
            return redirecting()->to("users");
        }

        public function insert() {            
        }

        public function test_add() {   
            $user               = new Usr();
            $user->Usrnm        = "Brayan_Test3";
            $user->Psswrd       = crypt("1234", '$2a$07$usesomesillystringforsalt$');
            $user->Rfrnc_Prsn   = 1;
            $user->UsrTyp_Rfrnc = 1;
            $user->Cndtn        = 1;
            $user->Rmvd         = 0;
            $user->Lckd         = 0;
            $user->DtAdmssn     = "0001-01-01";
            $user->ChckTm       = "00:00:00";

            //echo $user->Usrnm;

            $user->getTable();            
            $user->save();
            echo $user->Rfrnc;              
        }
     
    }
?>