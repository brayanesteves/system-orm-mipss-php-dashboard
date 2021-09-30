<?php
    namespace libs\ORM;
    class Model extends EtORM {
        /**
         * Property that will dynamically contain all properties
         */
        private $data = array();
        protected static $table;

        function __construct($data = null) {
            $this->data = $data;
        }
        
        function __get($name) {
            if(array_key_exists($name, $this->data)) {
                return $this->data[$name];
            }
        }                
        function __set($name, $value) {
            $this->data[$name] = $value;
        }
        public function getColumns() {
            return $this->data;
        }
        
    }
?>