<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 28/09/2021
     * Time: 01:39 PM
     * 
     * Read routes, config @file 'app/routes/'
     */
    class Route {
        /**
         * Method that allows us to enter drivers with their respective routes
         */        
        private $_controllers = array();
        public function controllers($controller) {
            $this->_controllers = $controller; 
            /**
             * Call to the method that makes the route process
             * The class (Path) is called every time a page is reloaded or opened in the application
             * 
             * - (this)    Reference to the class instantiated object
             * - (self: :) Reference to current class
             */
            self::submit();
        }

        /**
         * Function or method that is executed each time the request is sent in the URL
         */
        public function submit() {
            /**
             * They are the GET ['url'] requests made on our app             * 
             * Retrieve URL
             */
            $url = isset($_GET['url']) ? $_GET['url'] : "/";
            /**
             * It will store the GET ['url] array divided by "/"
             * Split the url into parts and form an array
             */
            $paths = explode("/", $url);
            /**
             * Make a conditional to find out if it is in a controller or in the main route
             */
            if($url == "/") {
                /**
                 * Main
                 * Searching if the path (/) exists in the array of _controllers
                 */
                $response = array_key_exists("/", $this->_controllers);
                /**
                 * Checking
                 */
                if($response != "" && $response == 1) {
                    /**
                     * $route => $controller or also $key => $value the array
                     * 
                     * Looping through the _controllers
                     */
                    foreach($this->_controllers as $route => $controller) {
                        /**
                         * We check whether the routes are the same
                         */
                        if($route == "/") {
                            /**
                             * We assign a variable the path of the controller
                             */
                            $Storecontroller = $controller;
                        }
                    }
                    /**
                     * We call the method that the controller retrieves for us
                     * 
                     * Basically you must execute as follows TestController::index()
                     */
                    $this->getController("index", $Storecontroller);
                }
            } else {                
                /**
                 * Controllers and Methods
                 */
                // echo "<b>URL:</b> ".$url."<br><hr>";
                /**
                 * The route status will serve to validate if the route of the controller and the method is correct
                 */
                $status = false;           
                foreach($this->_controllers as $route => $controller_) {
                    
                    // echo "<br><b>Route:</b> ".$route."<br>";
                    /**
                     * ($paths) the array of routes that we put in the browser
                     * $paths[0]
                     * Example:
                     * http://localhost/system-orm-mipss-php/test/args
                     *                                        [0] [1]
                     * We perform a 'trim' to the route to clean the "/", that is:
                     * "/users" => "userController"
                     *   $route       $controller
                     */
                    if(trim($route, "/")  != "") {
                        $location = strpos($url, trim($route, "/"));

                        if($location === false) {
                            //  echo "<small style='color:red;'>Not found</small><br>";
                        } else {

                            // echo "<small style='color:green;'>Found</small><br>";
                            /**
                             * 'Array' where the web parameters will be saved
                             */
                            $arrayParams   = array();
                            /**
                             * Status route
                             */
                            $status        = true;
                            $_controller   = $controller_;
                            $method        = "";
                            $quantityRoute = count(explode("/", trim($route, "/")));
                            $quantity      = count($paths);
                            if ($quantity > $quantityRoute) {
                                $method = $paths[$quantityRoute];
                                for ($i = 0; $i < count($paths); $i++) {
                                    if ($i > $quantityRoute) {
                                        $arrayParams[] = $paths[$i];
                                    }
                                }
                            }
                            // echo "<b>Params: </b>".json_encode($arrayParams);
                            // echo "<br><b>Quantity route</b>: ".count(explode("/",trim($route,"/")))."<br>";
                            // echo "<br><b>Quantity URL</b>: ".count($paths)."<br>";
                            /*if(count($paths) > 1){
                                $method = $paths[1];
                            }*/
                            $this->getController($method, $_controller, $arrayParams);
                        }

                    }
                }

                if($status == false) {
                    die("Route error");
                }
            }

        }

        /**
         * This function will help us to invoke the controller with the method that it must execute
         * @param {} $method
         * @param {} $controller
         */
        public function getController($method, $controller, $params = null) {
            /**
             * Method
             */
            $methodController = "";
            /**
             * We check if 'index' is or not the method or function of the controller
             */
            if($method == "index" || $method == "" || is_null($method)) {
                $methodController = "index";
            } else {
                $methodController = $method;
            }
            /**
             * We include the controller
             */
            $this->includeController($controller);

            /**
             * Check if class has been defined
             * We check if the class exists
             */
            if(class_exists($controller)) {
                /**
                 * We perform an instance of the included controller
                 * $ClassTemp = new TestController();
                 * We create a temporary class based on the '$controller' variable
                 * Example:
                 * (TestController)
                 * $class = new TestController();
                 */
                $ClassTemp = new $controller();
                /**
                 * Check the contents of a variable can be called as a function
                 * We check if the function or method of this class can be called
                 */
                if(is_callable(array($ClassTemp, $methodController))) {
                    /**
                     * We make a call to the method of this class
                     * class->index();
                     */
                    // $ClassTemp->$methodController();                    
                    if ($methodController == "index") {
                        if (count($params) == 0) {
                            $ClassTemp->$methodController();
                        } else {
                            die("Error params");
                        }
                    } else {
                        call_user_func_array(array($ClassTemp, $methodController), $params);
                    }
                } else {
                    die("The method does not exist");
                }
            } else {
                die("Class does not exist. Check the 'core.php'");
            }
        }
        
        /**
         * This function will include the controller, that is: include ("TestController.php")
         * @param {} $controller
         */
        public function includeController($controller){
            /**
             * Checks if there is a file or directory
             * Validating if the file exists or not
             */
            if(file_exists(APP_ROUTE . "controller/" . $controller . ".php")) {
                /**
                 * If it exists we include it
                 */
                include APP_ROUTE . "controller/" . $controller . ".php";
            } else {
                
                die("Error finding driver file");
            }
        }
    }
?>