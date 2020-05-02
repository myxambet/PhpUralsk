<?php 
namespace Myproj\Controllers;

use Myproj\View\View;
use MyProj\Models\Articles\Article;
class ArticlesController 
{
   
    private $view;

    public function __construct(){
       
        $this->view = new View(__DIR__ . '/../../templates');
    }

        public function view(int $articleId)
  {
    $article = Article::getById($articleId);
    

      if ($article === []) {
        $this->view->renderHtml('errors/404.php',[],404);
        return;
      }
      

      $this->view->renderHtml('articles/view.php', [
          'article' => $article
         
      ]);
  }


}           

