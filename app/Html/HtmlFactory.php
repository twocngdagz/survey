<?php

namespace App\Html;

class HtmlFactory
{
    public function make($element, $attr)
    {
        $className = "App\\Html\\Elements\\" . ucfirst($element);

        if (! class_exists($className)) {
            throw new \RuntimeException('Html element ' . $element . ' not found');
        }

        return new $className($attr);
    }
}
