<?php

use App\Form;
use App\Question;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class QuestionTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function question_with_text_input_type_should_render_as_html_input_tag_with_type_as_text ()
    {

        $form = factory(Form::class)->states('published')->create();

        $text_question = factory(Question::class)->create([
            "name" => "first_name",
            "type" => "text",
            "label" => "What is your First Name",
            "form_id" => $form->id
        ]);

        $html = $text_question->render();

        $this->assertSame(
            '<label>What is your First Name</label><input type="text" name="first_name">',
            $html
        );
    }


}
