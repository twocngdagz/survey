<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function render()
    {
        return "<label>{$this->label}</label><input type=\"text\" name=\"{$this->name}\">";
    }
}
