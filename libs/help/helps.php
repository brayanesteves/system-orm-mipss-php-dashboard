<?php
    /**
     * Function that allows us to include the models dynamically
     */
    function includeModels() {
        $directory = opendir(MODELS);
        while($file = readdir($directory)) {
            if(!is_dir($file)) {
                require_once MODELS . $file;
            }
        }
    }

    /**
     * This function will help us to return an 'assets' 
     * $assets: Name of the file inside the 'assets' folder
     */
    function assets($assets) {
        $urlmain = trim(str_replace("index.php", "", $_SERVER['PHP_SELF']), "/");
        echo "/" . $urlmain . "/assets/" . $assets;
    }
    /**
     * Function that allows redirection to another part 
     * $route: Route to where we want to go
     */
    function _redirect($route) {
        $urlmain = str_replace("index.php", "", $_SERVER['PHP_SELF']);
        return $urlmain;
    }

    /**
     * Function that allows us to write a 'URL' through which we pass it 
     * $route: Route to where to go
     */
    function url($route) {
        $urlmain = str_replace("index.php", "", $_SERVER['PHP_SELF']);
        echo "/" . trim($urlmain, "/") . "/" . $route;
    }

    /**
     * Function creating the 'csrf' for validation - token
     */
    session_start();
    function csrf_token() {
        if(isset($_SESSION["token"])) {
            unset($_SESSION["token"]);
        }
        $csrf_token             = md5(uniqid(mt_rand(), true));
        $_SESSION["csrf_token"] = $csrf_token;
        echo $csrf_token;
    }

    /**
     * Validate CSRF token via sessions
     */
    function validate_csrf() {
        if($_REQUEST['_token'] == $_SESSION['csrf_token']) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Function that allows us to recover an 'input'
     */
    function input($field) {
        $_field = $_POST[$field];

        $_field = trim($field);
        $_field = stripcslashes($field);
        $_field = htmlspecialchars($field);

        return $_field;
    }
    /**
     * @depracated
     */
    function _input($name) {
        $response = new \Library\help\Request();
        return $response->input($name);
    }

    /**
     * Function that allows us to return 'JSON' by means of an 'array'
     */
    function json_response($data) {
        header('Content-Type: application/json');
        if(is_array($data)) {
            $array = array();
            foreach($data as $d) {
                array_push($array, $d->getColumns());
            }
            return json_encode($array);
        } else {
            return json_encode($data->getColumns());
        }
    }

    /**
     * Allows you to encrypt a 'string'
     */
    function encrypt($string) {
        return crypt($string, '$2a$07$usesomesillystringforsalt$');
    }

    /**
     * Redirecting
     */
    function redirecting() {
        return new _Redirect();
    }
?>