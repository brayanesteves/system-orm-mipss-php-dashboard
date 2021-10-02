<?php
    /**
     * Created by Visual Studio Code
     * User: Brayan Esteves [VE]
     * Date: 28/09/2021
     * Time: 01:39 PM
     * 
     * All the routes available in our app
     * This file is going to be updated, every time a controller is added we add a route if necessary
     */
    $route = new Route();
    $route->controllers(array(
        "/"             => "MainController",
        "/login"        => "AuthController",
        "/users"        => "UsersController",
        "/user"         => "UserController",
        "/products"     => "ProductsController",
        "/salesinvoice" => "SalesInvoiceController",
        "/admin"        => "AdminController",
    ));
?>