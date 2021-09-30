<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 30/09/2021
     * Time: 13:44 
     */
    namespace libs\ORM;
    class EtORM extends \Connection {

        protected static $cnnctn;
        /**
         * Recover table
         */
        protected static  $table;

        function __construct() {
            /**
             * Execute every time the class is invoked by means of an object
             */
            self::getConnect();
        }

        public static function getConnect() {
            self::$cnnctn = \Connection::connect();
        }

        public static function getTable() {
            echo static::$table;
        }

        public function save() {
            $values   = $this->getColumns();
            /**
             * A variable that will store the columns
             */
            $filtered = null;
            foreach ($values as $key => $value) {
                /**
                 * Separate if it is 'Rfrnc' - If not add it to the 'array'
                 */
                if($value !== null && !is_integer($key) && $value !== '' && strpos($key, 'obj_') === false && $key !== 'Rfrnc') {
                    if($value === false) {
                        $value = 0;
                    }
                    $filtered[$key] = $value;
                    // echo $key . " - " . $value;
                }
                // echo $key . "<br />";
            }
            /**
             * Getting the columns
             */
            $columns = array_keys($filtered);
            // echo json_encode($columns);

            /**
             * Field 'Rfrnc' (Integer) Auto Increment
             */
            if($this->Rfrnc) {
                $params = "";
                foreach($columns as $column) {
                    $params .= $column . " = :" . $column . ",";
                }
                $params = trim($params, ",");
                $query  = "UPDATE " . static::$table . " SET $params WHERE `Rfrnc` = " . $this->Rfrnc;
                // echo $query;
            } else {
                $params  = join(", :", $columns);
                $params  = ":" . $params;
                $columns = join(", ", $columns);
                $query   = "INSERT INTO " . static::$table . " ($columns) VALUES ($params)";
                // echo $query;
            }
            // echo $query;
            /**
             * Let's prepare the query
             */
            self::getConnect();
            $response = self::$cnnctn->prepare($query);
            /**
             * We load all the values of the parameters.
             */
            foreach($filtered as $key => &$val) {                
                $response->bindParam(":" . $key, $val);
            }
            /**
             * We made a response
             */
            if($response->execute()) {
                $this->Rfrnc   = self::$cnnctn->lastInsertId();
                self::$cnnctn = null;
                return true;
            } else {
                return false;
            }
        }

        /**
         * 
         */
        public static function where($column, $operador = "", $value) {
            $query = "SELECT * FROM " . static::$table . " WHERE " . $column . " = :" . $column;
            // echo $query;
            $class = get_called_class();
            self::getConnect();
            $response = self::$cnnctn->prepare($query);
            $response->bindParam(':' . $column, $value);
            // $response->setFetchMode(PDO::FETCH_CLASS, $class);
            $response->execute();
            // $rows = $response->fetch();
            // echo count($rows);
            foreach($response as $row) {
                $object[] = new $class($row);
            }
            return $object;
        }
        
        /**
         * 
         */
        public static function find($Rfrnc) {
            // echo get_called_class();
            $response = self::where("Rfrnc", "", $Rfrnc);
            return $response[0];
        }

        public static function all() {
            $query = "SELECT * FROM " . static::$table;
            // echo $query;
            $class = get_called_class();
            self::getConnect();
            $response = self::$cnnctn->prepare($query);
            // $response->setFetchMode(PDO::FETCH_CLASS, $class);
            $response->execute();
            // $rows = $response->fetch();
            // echo count($rows);
            foreach($response as $row) {
                $object[] = new $class($row);
            }
            return $object;
        }
    }
?>