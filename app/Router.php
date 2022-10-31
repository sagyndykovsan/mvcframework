<?php

namespace App;

class Router {

    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $path = $this->request->getPath(); 
        $method = $this->request->getMethod(); 
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            response()->setResponseCode(404);
            return 'Not found';
        }

        if (is_string($callback)) {
            return view($callback);
        }

        if (is_array($callback)) {
            [$class, $action] = $callback;

            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $action)) {
                    return call_user_func_array([$class, $action], []);
                }
            }
        }

        return call_user_func($callback);
    }

}