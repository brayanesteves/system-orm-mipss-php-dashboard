<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 01/10/2021
     * Time: 14:00  
     */
    use View\Views;
    use App\model\Usr;
    use \libs\ORM\EtORM;
    class AuthController {
        /**
         * URL:
         * http://localhost/system-orm-mipss-php-dashboard/login
         */
        public function index() {            
            return Views::create("auth.login");
        }

        /**
         * URL
         * http://localhost/system-orm-mipss-php-dashboard/login/error
         */
        public function error() {
            if(Session::has("status")) {
                echo Session::get("status");
            }
        }

        /**
         * URL:
         * http://localhost/system-orm-mipss-php-dashboard/login/signin
         */
        public function signin() {    
            if(validate_csrf()) {                
                $objectORM = new EtORM();
                /**
                 * Crypt 'Blowfish'
                 * crypt(string $str, string $salt = ?);
                 * salt: Blowfish => $2a$07$usesomesillystringforsalt$
                 */
                $username = input("username");
                $password = encrypt(input("password"));
                $data     = $objectORM->procedure("0_Login", array($username, $password));
                //var_dump($data);
                //echo json_encode($data);
                if(count($data) > 0) {

                    /**
                     * 'Object' to '$_SESSION[]'
                     */
                    $user = new Usr();
                    $user->Rfrnc        = $data[0]['Rfrnc'];
                    $user->Usrnm        = $data[0]['Usrnm'];
                    $user->Psswrd       = $data[0]['Psswrd'];
                    $user->Rfrnc_Prsn   = $data[0]['Rfrnc_Prsn'];
                    $user->UsrTyp_Rfrnc = $data[0]['UsrTyp_Rfrnc'];
                    $user->Cndtn        = $data[0]['Cndtn'];
                    $user->Rmvd         = $data[0]['Rmvd'];
                    $user->Lckd         = $data[0]['Lckd'];
                    $user->DtAdmssn     = $data[0]['DtAdmssn'];
                    $user->ChckTm       = $data[0]['ChckTm'];                    
                    
                    $_SESSION['user'] = $user;

                    /**
                     * $_SESSION[]
                     */
                    $_SESSION['Rfrnc']        = $data[0]['Rfrnc'];
                    $_SESSION['Usrnm']        = $data[0]['Usrnm'];
                    $_SESSION['Psswrd']       = $data[0]['Psswrd'];
                    $_SESSION['Rfrnc_Prsn']   = $data[0]['Rfrnc_Prsn'];
                    $_SESSION['UsrTyp_Rfrnc'] = $data[0]['UsrTyp_Rfrnc'];
                    $_SESSION['Cndtn']        = $data[0]['Cndtn'];
                    $_SESSION['Rmvd']         = $data[0]['Rmvd'];
                    $_SESSION['Lckd']         = $data[0]['Lckd'];
                    $_SESSION['DtAdmssn']     = $data[0]['DtAdmssn'];
                    $_SESSION['ChckTm']       = $data[0]['ChckTm'];                    
                   
                    redirecting()->to("/admin");
                } else {
                    redirecting()->to("/login")->withMessage(array("status" => "false", "message" => "Incorrect username/password"));
                }
            } else {
                redirecting()->to("/login")->withMessage(array("status" => "false", "message" => "Incorrect username/password"));
            }     
        }

        /**
         * Example:
         * <form role="form" action="<?php url("login/test_signin"); ?>" method="POST">
         * </form>
         */
        public function test_signin() {    
            if(validate_csrf()) {
                echo input("username");
                echo "<br /> ";
                echo input("password");
            } else {
                echo "??ERROR!";
            }     
        }

        /**
         * URL
         * http://localhost/system-orm-mipss-php-dashboard/login/test_error
         */
        public function test_error() {
            echo $_SESSION["status"] . "<br />";
            echo $_SESSION["message"];
        }
    }
?>