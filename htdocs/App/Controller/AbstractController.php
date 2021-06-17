<?php

namespace App\Controller;
abstract class AbstractController
{
    const TEMPLATE_PATH = '/templates/';
    private $data = [];

    function render(string $template, array $args = []): void
    {
        $this->data = $args;
        include BASE_DIR . self::TEMPLATE_PATH . $template;
    }

    function getData(string $key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return null;
    }
}