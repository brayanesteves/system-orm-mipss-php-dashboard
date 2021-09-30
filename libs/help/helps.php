<?php
    /**
     * 
     */
    function includeModels() {
        $directory = opendir(MODELS);
        while($file = readdir($directory)) {
            if(!is_dir($file)) {
                require_once MODELS . $file;
            }
        }
    }
?>