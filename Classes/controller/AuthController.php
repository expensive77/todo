<?php

namespace Classes\controller;

use Classes\Main\Request;
use Classes\main\View;
use Classes\model\Todo;

class AuthController
{
    public Todo $todo;

    public function __construct()
    {
        $this->todo = new Todo;
    }
    public function login(Request $request)
    {   
        return (new View)->renderView("login");
    }
}
