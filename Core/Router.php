<?php

namespace Core;

use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        //return the instance
        return $this;
    }

    public function get($uri, $controller) {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller) {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller) {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller) {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    
        return $this;
    }

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            
            // find the corresponding routes
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                
                // apply the middleware set on the route to the resolve method which will figure out if there
                //is a corresponding middleware class, if its not there then abort otherwise instantiate it and call the corresponding middleware logic
                Middleware::resolve($route['middleware']);

                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    function abort($code = 404) {
        http_response_code($code);

        require base_path("views/{$code}.php");
        die();
    }
}
