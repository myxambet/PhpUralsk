<?php
spl_autoload_register(function(string $className){
    require_once __DIR__.'/'.$className.'.php';
});

$routes = require __DIR__.'/routes.php';
$route = $_GET["route"] ?? '';


$isRouteFound = false;
foreach($routes as $pattern => $controllerAndAction)
{
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}
 
if (!$isRouteFound) {
    echo 'Страница не найдена!';
    return;
}
unset($matches[0]);
$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);
// if(!empty($matches)){
//         $controller = new \MyProj\Controllers\MainController(); 
//         $controller -> sayHello($matches[1]);
//         return;
//     }

// $pattern = "~^$~";
// preg_match($pattern,$route,$matches);

// if(!empty($matches)){
//     $controller = new \MyProj\Controllers\MainController();
//     $controller -> main();
//     return;



 ?>
