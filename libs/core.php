<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 28/09/2021
     * Time: 01:12 PM
     */
    require_once("help/helps.php");
    define(  "APP_ROUTE", ROUTE_BASE .    "app/");
    define("VIEWS_ROUTE", ROUTE_BASE .  "views/");
    define(    "LIBRARY", ROUTE_BASE .   "libs/");
    define(     "ROUTES",  APP_ROUTE . "routes/");
    define(     "MODELS",  APP_ROUTE .  "model/");
    
    
    /**
     * Configuration
     */
    require_once(ROUTE_BASE . "config/config.php");
    require_once("ORM/Connection.php");
    require_once("ORM/EtORM.php");
    require_once("ORM/Model.php");
    require_once("help/class.inputfilter.php");

    /**
     * Libraries
     */
    require_once("vendor/Redirect.php");
    require_once("vendor/Session.php");

    includeModels();
    
    require_once("Views.php");
    include           "Route.php";
    include ROUTES . "routes.php";
?>