<?php

namespace Classes\main;
use Classes\main\Application;
class View
{
    public function renderView($view, array $params = [])
    {
        

        $layout = $this->renderLayout();
        $content = $this->renderContent($view, $params);
        $resulte = str_replace("{{content}}", $content, $layout);

        return $resulte;
        

    }

    public function renderContent($view, $params)
    {
        ob_start();
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        include_once Application::$ROOT . "/Classes/view/$view.php";
        return ob_get_clean();
    }

    public function renderLayout()
    {
        ob_start();
        include_once Application::$ROOT . "/Classes/view/layout/main.php";
        return ob_get_clean();
    }
}