<?php

namespace MyProj\View;

class View
{
    private $templatesPath;

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName)
    {
        

        include $this->templatesPath . '/' . $templateName;
    }
}