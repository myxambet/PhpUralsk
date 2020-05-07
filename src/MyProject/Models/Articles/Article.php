<?php

namespace MyProject\Models\Articles;

use \myproject\Models\ActiveRecordEntity;
use \MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;

    protected $authorId;

    /** @var string */
    protected $text;

    /** @var string */
    protected $createdAt;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function GetName(): string
    {
        return $this->name;
    }
    
    public function SetText(string $text)
    {
        $this->text = $text;
    }

    public function GetText(): string
    {
        return $this->text;
    }

    protected static function getTableName(): string
    {
        return "articles";
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }
}
