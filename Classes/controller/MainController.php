<?php

namespace Classes\controller;

use Classes\Main\Request;
use Classes\main\View;
use Classes\model\Todo;

class MainController
{
    public Todo $todo;

    public function __construct()
    {
        $this->todo = new Todo;
    }

    
    public function home(Request $request)
    {
        $id = $request->getBody()['id'] ?? null;
        return (new View)->renderView("home", ["todo" =>$this->todo->getTodo($id)]);
    }

    public function addTodo(Request $request)
    {
        $task = $request->getBody()['todo'];
        $this->todo->addTodo($task);

        return (new View)->renderView("Add", ["task" => $task]);
    }

    public function addForm()
    {
        return (new View)->renderView("Add");
    }

    public function toggleTodo(Request $request)
    {
        $id = $request->getBody()['id'];
        $this->todo->toggleTodo($id);
    }

    public function deleteTodo(Request $request)
    {
        $id = $request->getBody()['id'];
        $this->todo->deleteTodo($id);
    }
}