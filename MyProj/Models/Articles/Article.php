<?php

namespace MyProj\Models\Articles;
use MyProj\Models\ActiveRecordEntity;
use MyProj\Models\Users\User;
class Article extends ActiveRecordEntity
{
    protected $name;

    protected $text;

    protected $authorId;

    protected $createdAt;

    public function getName():string 
    {
        return $this->name;  
    }

    public function getText():string 
    {
        return $this->text;
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function setName(string $name){
        return $this->name = $name;
    }
    
    public function setText(string $text)
    {
        return $this->text = $text;
    }
 
}

