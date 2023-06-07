<?php

require_once './src/controllers/DefaultController.php';
require_once './src/controllers/SecurityController.php';
require_once './src/controllers/ReviewController.php';

class Routing {
    public static $routes;

    public static function post($url, $view){
        self::$routes[$url] = $view;
    }

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function run($url) {
        $action = explode("/", $url)[0];

        if(! array_key_exists($action, self::$routes)) {
            die("Wrong url! Stopping");
        }

        $controller_name = self::$routes[$action];
        $controller_obj = new $controller_name;
        $action = $action ?: 'index'; # for handling "localhost:8080/" - empty 'action'
        $controller_obj->$action(); # Creation of controller object requires including it's object with "require_once"
    }

}