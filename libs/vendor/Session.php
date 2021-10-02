<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 02/10/2021
     * Time: 15:21
     */

     /**
      * To work this class must include the 'libs/core.php' of the project
      */
    class Session {
        /**
         * Allows to validate if a session exists
         */
        public static function has($variable_session) {
            if(isset($_SESSION[$variable_session])) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Get a session variable
         */
        public static function get($variable_session) {
            try {
                $message = $_SESSION[$variable_session];
                session_unset($_SESSION[$variable]);
                return $message;
            } catch(Exception $exception) {
                
            }
        }

    }
?>