<?php

namespace  App\Core;


class Router
{

    private array $routes = [];
    public function get(string $path, array $action, array $roles = []): void
    {

        $this->routes['GET'][$path] = [
            'action' => $action,
            'roles' => $roles
        ];
    }
    public function post (string $path ,array $action ,array $roles=[]):void{

    $this->routes['POST'][$path]=[

    'action'=>$action,
    'roles'=>$roles
    ]; 
    }

    public function dispach(string $uri, string $method)
    {
        $path=parse_url($uri,PHP_URL_PATH);
        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            require '../app/Views/errors/404.php';
            return;
        }

        $route = $this->routes[$method][$path];

        // Vérification Auth + Rôle
        if (!empty($route['roles'])) {
            Auth::check($route['roles']);
        }

        [$controller, $methodAction] = $route['action'];

        $controllerInstance = new $controller();
        $controllerInstance->$methodAction();
    }

  
}
