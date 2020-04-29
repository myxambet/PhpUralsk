<?php 
namespace Myproj\Controllers;
use Myproj\Services\Db;     
use Myproj\View\View;
class ArticlesController 
{
    private $db;
    private $view;

    public function __construct(){
        $this->db = new Db();
        $this->view = new View(__DIR__ . '/../../templates');
    }

        public function view(int $articleId)
  {
      $result = $this->db->query(
         'SELECT * FROM `articles` WHERE id = :id;',
          [':id' => $articleId]
      );

      if ($result === []) {
        $this->view->renderHtml('errors/404.php',[],404);
        return;
      }
      $this->view->renderHtml('articles/view.php', ['article' => $result[0]]);
  }


}           

