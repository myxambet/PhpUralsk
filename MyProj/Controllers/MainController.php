<?php
namespace MyProj\Controllers;
use MyProj\View\View;
use MyProj\Services\Db;
class MainController 
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../templates');
        $this->db = new Db();
    }

    public function main()
    {
        $articles = $this->db->query('SELECT * FROM `articles`;');
        var_dump($articles);
        //$this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name)
    {
      
        $this->view->renderHtml('main/hello.php', ['name' => $name]);
    }
}


?>