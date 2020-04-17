<?php
spl_autoload_register(function(string $className){
    require_once $className.'.php';
});

$controller = new \MyProj\Controllers\MainController();


if(!empty($_GET['name'])){
        $controller -> sayHello($_GET['name']);}
    else{
        $controller -> main();
    }

 ?>
