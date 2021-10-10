<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 02/10/2021
     * Time: 14:07
     */

     /**
      * To work this class must include the 'libs/core.php' of the project
      */
    class _Redirect {
        /**
         * Function that redirects somewhere
         * Param: $url - Specify the URL where it will go
         * Example:
         * ('hello/new')
         */
        public static function to($url) {
            self::redirect($url);
            return new _Redirect();
        }

        /**
         * Function that redirects somewhere carrying data in the variable '$_SESSION[]'
         * 1) Parameter: @param {object || array} $variable - Name of the variable '$_SESSION[]' to create or 'Array' of '$_SESSION []' variables with values
         * 2) Parameter: @param {object || array} $value    - If the parameter '$variable' is not an 'Array', this would be the value, example: ('message', 'hello')
         */
        public static function withMessage($variable, $value = null) {
            if(is_null($value)) {
                foreach($variable as $key => $_value) {
                    $_SESSION[$key] = $_value;
                }
            } else {
                $_SESSION[$variable] = $value;
            }
            return new _Redirect();
        }

        /**
         * Function that allows redirection to another part 
         * $route: Route to where we want to go
         */
        private function redirect($route) {
            $url = "";
            if(trim($_SERVER['PHP_SELF'], "/") == "index.php") {
                $url = $route;
            } else {
                $urlmain = str_replace("index.php", "", $_SERVER['PHP_SELF']);
                $url     = "/" . trim($urlmain, "/") . '/' . $route;
            }
            //header("location:/" . trim($urlmain, "/") . "/" . trim($route, "/"));
            header("location:" . $url);
        }

    }
?>