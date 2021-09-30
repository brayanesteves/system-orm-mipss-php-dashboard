<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 27/09/2021
     * Time: 12:38 PM
     */
    class Connection {
        public static function connect() {
            try {
                $cnnct = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER , PASSWORD);
                return $cnnct;
            } catch (PDOException $ex) {
                $ex->getMessage();
            }
        }
    }

    Connection::connect();
?>