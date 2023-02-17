<?php

namespace Classes\main;
use Classes\Main\Request;
use Classes\Main\Response;
use Classes\Main\Route;
class Application
{
    public static string $ROOT;
    public Route $Route;
    public Request $request;
    public Response $response;

    public function __construct($root_path)
    {
        self::$ROOT = $root_path;
        $this->request = new Request;
        $this->response = new Response;
        $this->Route = new Route($this->request, $this->response);
    }

    public function get($path, $callback)
    {
        $this->Route->get($path, $callback);
    }

    public function post($path, $callback)
    {
        $this->Route->post($path, $callback);
    }

    public function run()
    {
        echo $this->Route->resolve();
    }
}