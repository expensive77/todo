<?php 
namespace Classes\Main;
use Classes\Main\Request;
use Classes\Main\Response;
use Classes\main\View;
class Route
{
    protected static $routes=[];
    protected Request $request;
    protected Response $response;

    public function __construct(Request $request,Response $response)
    {
        $this->request=$request;
        $this->response=$response;
    }

    public static function get($path, array $callback)
    {
        self::$routes['get'][$path] = $callback;
    }

    public static function post($path, array $callback)
    {
        self::$routes['post'][$path] = $callback;
    }

    public static function put($path, array $callback)
    {
        self::$routes['put'][$path] = $callback;
    }

    public static function delete($path, array $callback)
    {
        self::$routes['delete'][$path] = $callback;
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

        // View


        // function or method

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
