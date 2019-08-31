<?php

namespace App\Html\Elements;

use App\Html\AttributableArray;

class Text extends AttributableArray
{
    public function render()
    {
        $attributes = $this->attributes($this->options);
        return "<input{$attributes}>";
    }
}
