<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return static function (App $app): void {
    $app->get('/health', static function (Request $request, Response $response): Response {
        $response->getBody()->write(json_encode(
            ['status' => 'ok'],
            JSON_THROW_ON_ERROR
        ));

        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/api/hello/{name}', static function (Request $request, Response $response, array $args): Response {
        $response->getBody()->write(json_encode(
            ['message' => 'Hello, ' . $args['name'] . '!'],
            JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE
        ));

        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->post('/api/echo', static function (Request $request, Response $response): Response {
        $response->getBody()->write(json_encode(
            ['data' => $request->getParsedBody()],
            JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE
        ));

        return $response->withHeader('Content-Type', 'application/json');
    });
};
