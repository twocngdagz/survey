<?php

namespace App;

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

    public function render()
    {
        $formCode = '<form>';
        $formCode .= '</form>';

        return $formCode;
    }
}
