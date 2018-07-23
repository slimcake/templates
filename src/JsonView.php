<?php

namespace Slimcake\Templates;

/**
 * Class JsonView
 * @package Slimcake\Templates
 */
class JsonView extends View
{
    public function build()
    {
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($this->data);
    }
}
