<?php

use Amaur\App\controller\HomeController;

session_start();

require "../vendor/autoload.php";

if(isset($_GET['controller'])) {
    $controller = "Amaur\\App\\controller\\" . ucfirst(filter_var($_GET['controller'], FILTER_SANITIZE_STRING)) . "Controller";

    if(class_exists($controller)) {
        $controller = new $controller();

        if(isset($_GET['action'])) {
            $action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);

            try {
                if((new ReflectionClass($controller))->hasMethod($action)) {
                    $controller->$action();
                }
            }
            catch (ReflectionException $reflectionException) {
                echo $reflectionException->getMessage();
            }
        }
        else {
            $controller->home();
        }
    }
    else {
        (new HomeController())->home();
    }
}
else {
    (new HomeController())->home();
}
