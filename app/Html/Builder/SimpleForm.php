<?php

namespace App\Html\Builder;

use App\Html\Builder\FormBuilder;
use App\Html\HtmlFactory;

class SimpleForm implements FormBuilder
{
    protected $factory;

    public function __construct(HtmlFactory $factory)
    {
        $this->factory = $factory;
    }

    public function text($question)
    {
        return $this->factory->make("text", [
            "name" => $question->name,
            "type" => $question->type
        ])->render();
    }

    public function textarea($question)
    {
        return $this->factory->make("textarea", [
            "name" => $question->name,
        ])->render();
    }

    public function submit()
    {
        return $this->factory->make("submit", [
            "type" => "submit",
            "value" => "Submit"
        ])->render();
    }

    public function radio($question)
    {
        $radioHtml = "";
        foreach ($question->options as $key => $value) {
            $radioHtml .= $this->factory->make('radio', [
                "type" => "radio",
                "name" => $question->name,
                "value" => $key
            ])->render(). " " . $value;
        }
        return $radioHtml;
    }

    public function select($question)
    {
        return $this->factory->make("select", [
            "name" => $question->name,
            "options" => $question->options
        ])->render();
    }

    public function checkbox($question)
    {
        return $this->factory->make("checkbox", [
            "name" => $question->name,
            "type" => "checkbox"
        ])->render() . " " . $question->label;
    }
}
