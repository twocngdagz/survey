<?php

namespace App\Html\Builder;

interface FormBuilder
{
    public function text($question);

    public function textarea($question);

    public function submit();

    public function radio($question);

    public function select($question);

    public function checkbox($question);
}
