<?php

namespace App\Core;

class Router
{
    private array $routes = [];
    public function get(string $path, array $action, array $roles = [])
    {
        $this->routes['GET'][$path] = [
            'action' => $action,
            'roles'  => $roles
        ];
    }

    public function post(string $path, array $action, array $roles = [])
    {
        $this->routes['POST'][$path] = [
            'action' => $action,
            'roles'  => $roles
        ];
    }

    public function dispatch(string $uri, string $method)
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $path = str_replace('/Authentication/public/index.php', '', $path);
        $path = $path ?: '/';

        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            require __DIR__ . '/../Views/errors/403.php';
            exit;
        }

        $route = $this->routes[$method][$path];

        if (!empty($route['roles'])) {

            if (!isset($_SESSION['user'])) {
                header('Location: /Authentication/public/index.php/login');
                exit;
            }

            if (!in_array($_SESSION['user']['role'], $route['roles'])) {
                http_response_code(403);
                require __DIR__ . '/../Views/errors/403.php';
                exit;
            }
        }

        [$controller, $methodAction] = $route['action'];
        (new $controller())->$methodAction();
    }
}