<?php

declare(strict_types=1);

$vendorDirectory = __DIR__;
$prefixes = [
    'Slim\\Psr7\\' => [$vendorDirectory . '/slim/psr7/src/'],
    'Psr\\Http\\Message\\' => [
        $vendorDirectory . '/psr/http-message/src/',
        $vendorDirectory . '/psr/http-factory/src/',
    ],
    'Psr\\Http\\Server\\' => [
        $vendorDirectory . '/psr/http-server-handler/src/',
        $vendorDirectory . '/psr/http-server-middleware/src/',
    ],
    'FastRoute\\' => [$vendorDirectory . '/nikic/fast-route/src/'],
    'Fig\\Http\\Message\\' => [$vendorDirectory . '/fig/http-message-util/src/'],
    'Psr\\Container\\' => [$vendorDirectory . '/psr/container/src/'],
    'Psr\\Log\\' => [$vendorDirectory . '/psr/log/src/'],
    'Slim\\' => [$vendorDirectory . '/slim/slim/Slim/'],
    'App\\' => [dirname(__DIR__) . '/src/'],
];

spl_autoload_register(static function (string $class) use ($prefixes): void {
    foreach ($prefixes as $prefix => $directories) {
        if (!str_starts_with($class, $prefix)) {
            continue;
        }

        $relativePath = str_replace(
            '\\',
            DIRECTORY_SEPARATOR,
            substr($class, strlen($prefix))
        ) . '.php';

        foreach ($directories as $directory) {
            $file = $directory . $relativePath;
            if (is_file($file)) {
                require $file;
                return;
            }
        }
    }
});

require_once $vendorDirectory . '/nikic/fast-route/src/functions.php';
require_once $vendorDirectory . '/ralouphie/getallheaders/src/getallheaders.php';
