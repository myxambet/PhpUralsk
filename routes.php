<?php
return [
    '~^hello/(.*)$~' => [\MyProj\Controllers\MainController::class, 'sayHello'],
    '~^$~' => [\MyProj\Controllers\MainController::class, 'main'],
];
?>