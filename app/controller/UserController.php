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
    class UserController {

        public function index() { 
   
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