<?php

namespace Slimcake\Templates;

use Slimcake\Core\View;

/**
 * Class TemplateView
 * @package Slimcake\Templates
 */
class TemplateView extends View
{
    /** @var string $template */
    protected $template;

    /**
     * @return mixed|string
     * @throws \Slimcake\Core\Exception
     */
    public function build()
    {
        $this->set('__contents__', parent::build());
        $this->render($this->template);

        return $this->extract();
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
}
