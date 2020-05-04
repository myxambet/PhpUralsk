<?php
return [
    '~^hello/(.*)$~' => [\MyProj\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\MyProj\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' =>[\MyProj\Controllers\ArticlesController::class,'view'],
    '~^articles/(\d+)/edit$~' => [\MyProj\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\MyProj\Controllers\ArticlesController::class, 'add'],
];
?>