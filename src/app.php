<?php

declare(strict_types=1);

use Slim\Factory\AppFactory;
use Slim\App;

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(
    getenv('APP_DEBUG') === '1',
    true,
    true
);

$registerRoutes = require __DIR__ . '/routes.php';
$registerRoutes($app);

return $app;
