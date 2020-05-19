<?php

use App\Core\App;
use App\Core\Middleware\MiddlewareStack;
use App\Http\Middleware\{FirstMiddleware, SecondMiddleware};

require __DIR__ . '/vendor/autoload.php';

$app = new App(new MiddlewareStack());
$app->add(new FirstMiddleware());
$app->add(new SecondMiddleware());
$app->run();
