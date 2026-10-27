<?php

declare(strict_types=1);

if (PHP_SAPI === 'cli-server') {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($path !== false && $path !== null) {
        $publicDirectory = realpath(__DIR__);
        $requestedFile = realpath(__DIR__ . $path);

        if (
            $publicDirectory !== false
            && $requestedFile !== false
            && str_starts_with($requestedFile, $publicDirectory . DIRECTORY_SEPARATOR)
            && is_file($requestedFile)
        ) {
            return false;
        }
    }
}

require dirname(__DIR__) . '/vendor/autoload.php';

$app = require dirname(__DIR__) . '/src/app.php';
$app->run();
