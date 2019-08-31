<?php

namespace App\Html\Elements;

use App\Html\AttributableArray;

class Radio extends AttributableArray
{
    public function render()
    {
        $attributes = $this->attributes($this->options);
        return "<input{$attributes}>";
    }
}
