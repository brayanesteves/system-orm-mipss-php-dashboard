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
            $user               = new Usr();
            $user->Usrnm        = "Brayan_Test";
            $user->Psswrd       = password_hash(1234, PASSWORD_DEFAULT);
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
        
        public function insert() {            
        }
     
    }
?>