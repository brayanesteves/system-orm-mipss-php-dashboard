<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 28/09/2021
     * Time: 08:39 PM  
     */
    use View\Views;
    use App\model\Usr;
    class UsersController {

        public function index() {
            
        }

        public function search() {
            
        }
        public function insert() {
            
        }

        /**
         * Example:
         * http://localhost/system-orm-mipss-php/users/test
         */
        public function test() {
            /**
             * Fake data
             */
            $users = array(
                1 => array(
                    "Usrnm"        => "Brayan",
                    "Passwrd"      => 1234,
                    "Rfrnc_Prsn"   => 1,
                    "UsrTyp_Rfrnc" => 1,
                    "Cndtn"        => 1,
                    "Rmvd"         => 0,
                    "Lckd"         => 0,
                    "DtAdmssn"     => "0001-01-01",
                    "ChckTm"       => "00:00:00"
                ),
                2 => array(
                    "Usrnm"        => "Otniel",
                    "Passwrd"      => 1234,
                    "Rfrnc_Prsn"   => 1,
                    "UsrTyp_Rfrnc" => 1,
                    "Cndtn"        => 1,
                    "Rmvd"         => 0,
                    "Lckd"         => 0,
                    "DtAdmssn"     => "0001-01-01",
                    "ChckTm"       => "00:00:00"
                ),
                3 => array(
                    "Usrnm"        => "Jhou",
                    "Passwrd"      => 1234,
                    "Rfrnc_Prsn"   => 1,
                    "UsrTyp_Rfrnc" => 1,
                    "Cndtn"        => 1,
                    "Rmvd"         => 0,
                    "Lckd"         => 0,
                    "DtAdmssn"     => "0001-01-01",
                    "ChckTm"       => "00:00:00"
                ),
                4 => array(
                    "Usrnm"        => "Nerón",
                    "Passwrd"      => 1234,
                    "Rfrnc_Prsn"   => 1,
                    "UsrTyp_Rfrnc" => 1,
                    "Cndtn"        => 1,
                    "Rmvd"         => 0,
                    "Lckd"         => 0,
                    "DtAdmssn"     => "0001-01-01",
                    "ChckTm"       => "00:00:00"
                ),
                5 => array(
                    "Usrnm"        => "Brandon",
                    "Passwrd"      => 1234,
                    "Rfrnc_Prsn"   => 1,
                    "UsrTyp_Rfrnc" => 1,
                    "Cndtn"        => 1,
                    "Rmvd"         => 0,
                    "Lckd"         => 0,
                    "DtAdmssn"     => "0001-01-01",
                    "ChckTm"       => "00:00:00"
                ),
            );
            /**
             * Example: 
             * 'users.list.index'
             * 1) 'users' => 'folder'
             * 2) 'list'  => 'folder'
             * 3) 'index' => file .php or .html
             */
            return Views::create("users.test", "users", array("users" => $users));
        }

        /**
         * Example:
         * http://localhost/system-orm-mipss-php/users/test_search
         */
        public function test_search() {
            $users = Usr::where("Usrnm", "", "Brayan");
            foreach($users as $user) {
                echo "<b>Username:</b> ". $user->Usrnm . " <b>Password:</b> " . $user->Psswrd . "<br />";
            }
        }

        /**
         * Example:
         * http://localhost/system-orm-mipss-php/users/test_search_params?user=Brayan
         */
        public function test_search_params() {
            $_user = $_REQUEST['user'];
            $users = Usr::where("Usrnm", "", $_user);
            foreach($users as $user) {
                echo "<b>Username:</b> ". $user->Usrnm . " <b>Password:</b> " . $user->Psswrd . "<br />";
            }
        }

        /**
         * Example:
         * http://localhost/system-orm-mipss-php/users/test_searching
         */
        public function test_searching() {
            $users = Usr::find(12);
            echo "<b>Username:</b> ". $users->Usrnm . " <b>Password:</b> " . $users->Psswrd . "<br />";
        }

        /**
         * Example:
         * http://localhost/system-orm-mipss-php/users/test_searching_params?Rfrnc=2
         */
        public function test_searching_params() {
            $Rfrnc = $_REQUEST['Rfrnc'];;
            $users = Usr::find($Rfrnc);
            echo "<b>Username:</b> ". $users->Usrnm . " <b>Password:</b> " . $users->Psswrd . "<br />";
        }

        /**
         * Example:
         * 
         */
        public function test_list() {
            $users = Usr::all();
            foreach($users as $user) {
                echo "<b>Reference:</b> ". $user->Rfrnc . " <b>Username:</b> ". $user->Usrnm . " <b>Password:</b> " . $user->Psswrd . "<br />";
            }
        }

        /**
         * Example
         * http://localhost/system-orm-mipss-php/users/test_save
         */
        public function test_save() {
            $user               = new Usr();
            $user->Usrnm        = "Brayan";
            $user->Psswrd       = 1234;
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
        
        /**
         * Example:
         * http://localhost/system-orm-mipss-php/users/test_searching_update
         */
        public function test_searching_update() {
            $users = Usr::find(12);
            $users->Usrnm = "Robertson";
            $users->save();
            echo "<b>Update successful</b>";
        }
    }
?>