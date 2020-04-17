<?php
namespace MyProj\Controllers;

class MainController 
{
    public function main(){
        echo "Главная страница";
    }


    public function sayHello(string $name)
    {
        echo "привет ".$name;
    }
}


?>