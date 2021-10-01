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
        echo "/" . $urlmain . "/assets" . $assets;
    }
    /**
     * Function that allows redirection to another part 
     * $route: Route to where we want to go
     */
    function redirect($route) {
        $urlmain = str_replace("index.php", "", $_SERVER['PHP_SELF']);
        header("location:/" . trim($urlmain, "/") . "" . $route);
    }
?>