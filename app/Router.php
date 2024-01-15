<?php

namespace App;

use App\Middleware\Middleware;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method, $middleware)
    {

        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action, 'middleware' => $middleware];
        return $this;
    }

    public function get($route, $controller, $action, $middleware = null)
    {
        return $this->addRoute($route, $controller, $action, "GET",$middleware);
    }

    public function post($route, $controller, $action, $middleware = null)
    {
        return $this->addRoute($route, $controller, $action, "POST",$middleware);
    }

    public function only($key)
    {
        $lastMethod = array_key_last($this->routes);
        if ($lastMethod !== null) {
            $lastRoute = end($this->routes[$lastMethod]);


            if ($lastRoute !== false) {
                $lastKey = key($this->routes[$lastMethod]);
                $this->routes[$lastMethod][$lastKey]['middleware'] = $key;
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    }


    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $_SESSION["data"] = isset(parse_url($_SERVER['REQUEST_URI'])['query']) ? parse_url($_SERVER['REQUEST_URI'])['query'] : Null;
        $method =  $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes[$method])) {
            Middleware::resolve($this->routes[$method][$uri]['middleware']);
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];
            $controller = new $controller();
            $controller->$action();
        } else {
            abord();
        }
    }
}

function abord($code = 404)
{
    http_response_code($code);

    require_once "../View/errors/$code.php";

    die;
}
