<?php

namespace App;

use App\Html\Builder\FormBuilder;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = [];

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function render(FormBuilder $builder)
    {
        $formCode = '<form>';

        foreach ($this->questions as $question) {
            $formCode .= $question->render($builder);
        }

        $formCode .= $builder->submit();

        $formCode .= '</form>';

        return $formCode;
    }
}
