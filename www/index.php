<?php

use MyProject\Controllers\MainController;
use MyProject\Services\Db;

spl_autoload_register(function (string $classname)
{
    require_once __DIR__.'/../src/'.$classname.'.php';
});

$route = $_GET['route'] ?? '';

$routes = require __DIR__.'/../src/routes.php';

$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
    break;
    }
}

if (!$isRouteFound) {
    echo 'Page not found';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);