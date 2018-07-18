<?php

namespace Slimcake\Templates;

use Slimcake\Core\Controller;
use Slimcake\Core\Exception;
use Slimcake\Core\View;

/**
 * Class TwigView
 * @package Slimcake\Templates
 */
class TwigView extends View
{
    const EXTENSION = 'twig';

    /** @var \Twig_Environment $twig */
    protected $twig;

    /**
     * @return \Twig_Environment
     */
    protected function getTwig()
    {
        return $this->twig;
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function extract()
    {
        return $this->twig->render($this->render, $this->data);
    }

    /**
     * TwigView constructor.
     * @param Controller $controller
     * @throws Exception
     */
    public function __construct(Controller $controller)
    {
        parent::__construct($controller);

        if (class_exists(\Twig_Environment::class) === false) {
            throw new Exception('Twig library is not installed');
        }

        $loader = new \Twig_Loader_Filesystem(sprintf('%s/', $this->path));
        $this->twig = new \Twig_Environment($loader);
    }
}
