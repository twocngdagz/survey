<?php

namespace App\Html\Elements;

use App\Html\AttributableArray;

class Input extends AttributableArray
{
    public function render()
    {
        $attributes = $this->attributes($this->options);
        return "<input{$attributes}>";
    }
}
