<?php

namespace App\Http\Controllers;

use App\Form;
use App\Html\Builder\FormBuilder;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function show($formId, FormBuilder $builder)
    {
        $form = Form::published()->findOrFail($formId);
        $content = $form->render($builder);
        return view('forms.show', ['form' => $form, 'content' => $content]);
    }
}
