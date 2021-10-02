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
        public function index() {
            return Views::create("auth.login");
        }

        public function signin() {    
            if(validate_csrf()) {                
                $objectORM = new EtORM();
                /**
                 * Crypt 'Blowfish'
                 * crypt(string $str, string $salt = ?);
                 * salt: Blowfish => $2a$07$usesomesillystringforsalt$
                 */
                $username = input("username");
                $password = crypt(input("password"), '$2a$07$usesomesillystringforsalt$');
                $data     = $objectORM->procedure("0_Login", array($username, $password));
                //var_dump($data);
                echo json_encode($data);
            } else {
                echo "¡ERROR!";
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
                echo "¡ERROR!";
            }     
        }
    }
?>