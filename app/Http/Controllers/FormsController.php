<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function show($formId)
    {
        $form = Form::published()->findOrFail($formId);
        return view('forms.show', ['form' => $form]);
    }
}
