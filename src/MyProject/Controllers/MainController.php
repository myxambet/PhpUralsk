<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\Db;
use MyProject\View\View;

class MainController
{
    private $view;
    private $db;

    public function __construct() {
        $this->view = new View(__DIR__.'/../../../templates');
        $this->db = $db = Db::getInstance();
    }

    public function main()
    {
        $articles = Article::findAll();

        $this->view->renderHtml('main/main.php', ['articles' => $articles]);    
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name'=>$name]);
    }
}