<?php

// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.

include_once "config/constants.php";
require_once "config/db.php";

if(isset($_GET["controller"])){
    $controller = getControllerPath($_GET["controller"]);
    $fileExist = file_exists($controller);
    if ($fileExist){
        require_once $controller;
    } else {
        $errorMsg = "esta pagina no existe";
        require_once VIEWS . "error/error.php";
    }

}else {
    require_once VIEWS . "main/main.php";
}

// In the event that the controller passed by URL does not exist, you must show the error view.


function getControllerPath($controller){
    return CONTROLLERS . $controller . "Controller.php";
}