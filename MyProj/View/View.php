<?php

namespace MyProj\View;

class View
{
    private $templatesPath;

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, array $vars = [])
    {
        extract($vars);

        include $this->templatesPath . '/' . $templateName;
    }
}