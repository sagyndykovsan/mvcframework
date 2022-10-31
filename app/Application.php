<?php

namespace App;

class Application {
    protected Request $request;
    public Router $router; 
    public static Response $response;

    public function __construct() {
        $this->request = new Request();
        $this->router = new Router($this->request);
        self::$response = new Response();
    }

    public function run() {
        echo $this->router->resolve();
    }
}