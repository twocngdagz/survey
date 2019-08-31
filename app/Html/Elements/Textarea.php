<?php

namespace App\Html\Elements;

use App\Html\AttributableArray;

class Textarea extends AttributableArray
{
    public function render()
    {
        $attributes = $this->attributes($this->options);
        return "<textarea{$attributes}></textarea";
    }
}
