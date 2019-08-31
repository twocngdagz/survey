<?php

namespace App;

use App\Html\Builder\FormBuilder;
use App\Html\HtmlFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function render(FormBuilder $builder)
    {
        return $builder->{$this->type}($this);
    }

    public function getOptionsAttribute($value)
    {
        return unserialize($value);
    }

    public function setOptionsAttribute($value)
    {
        $this->attributes['options'] = serialize($value);
    }
}
