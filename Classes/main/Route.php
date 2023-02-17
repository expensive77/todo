<?php 
namespace Classes\Main;
use Classes\Main\Request;
use Classes\Main\Response;
use Classes\main\View;
class Route
{
    protected $routes=[];
    protected Request $request;
    protected Response $response;
    protected View $view;

    public function __construct(Request $request,Response $response)
    {
        $this->request=$request;
        $this->response=$response;
        $this->view = new View;
    }

    public  function get($path, array $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public  function post($path, array $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public  function put($path, array $callback)
    {
        $this->routes['put'][$path] = $callback;
    }

    public  function delete($path, array $callback)
    {
        $this->routes['delete'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path];

        // Route not found
        if (is_null($callback)) {
            $this->response->setStatusCode(404);
            return (new View)->renderView("_404");
        }

        if (is_array($callback)) {
            $obj = new $callback[0];
            $func = $callback[1];
            return $obj->$func($this->request);
        }

    }

    // public static function run()
    // {
    //     $request = new Request();
    //     if ($request::$method == 'get') {
    //         $routes = self::$routes['get'];
    //     } else {
    //         if ($request->{'__method'}) {
    //             $routes = self::$routes[$request->{'__method'}];
    //         } else {
    //             $routes = self::$routes['post'];
    //         }
    //     }

    //     if (array_key_exists($request::$path, $routes)) {
    //         $route = $routes[$request::$path];
    //         call_user_func([new $route[0], $route[1]], $request);
    //     }
    }
