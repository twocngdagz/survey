<?php

namespace App\Html\Elements;

use App\Html\AttributableArray;

class Select extends AttributableArray
{
    public function render()
    {
        $attributes = $this->attributes($this->options);
        $selectHtml = "<select{$attributes}>";
        foreach ($this->options["options"] as $key => $value) {
            $selectHtml .= "<option value=\"{$key}\">{$value}</option>";
        }
        $selectHtml .= "</select>";
        return $selectHtml;
    }
}
