<?php 
namespace Myproj\Controllers;
use Myproj\Models\Users\User;
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
    
  
    // $reflector = new \ReflectionObject($article);
    // $properties = $reflector->getProperties();
    
    // $propertiesNames = [];
    // foreach ($properties as $property) {
    //     $propertiesNames[] = $property->getName();
    // }
    // var_dump($propertiesNames);
    // return;
    
      if ($article === []) {  
        $this->view->renderHtml('errors/404.php',[],404);
        return;
      }
      

      $this->view->renderHtml('articles/view.php', [
          'article' => $article
         
      ]);
  }


  public function edit(int $articleId) :void{
    $article = Article::getbyId($articleId);

    if ($article === null) {
      $this->view->renderHtml('errors/404.php', [], 404);
      return;
  }
  $article->setName('Новое название статьи');
  $article->setText('Новый текст статьи');
  $article->save();
  
  }

  public function add(){
    $author = User::getById(1);
    $article = new Article();
    $article->setAuthor($author);
    $article->setName('Новое название статьи');
    $article->setText('Новый текст статьи');

    $article->save();

    var_dump($article);
  }


}           

