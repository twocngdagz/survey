<?php

use App\Form;
use App\Question;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ViewFormsListTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function user_can_view_a_form()
    {
        //Arrange
        $form = factory(Form::class)->states('published')->create();

        //Act
        $this->visit("/forms/" . $form->id);

        //Assert
        $this->see("Application Form");
    }

    /** @test */
    public function user_cannot_view_unpublished_form()
    {
        $form = factory(Form::class)->states('unpublished')->create();

        $this->get("/forms/" . $form->id);

        $this->assertResponseStatus(404);
    }

    /** @test */
    public function user_can_view_a_text_in_the_form()
    {
        //Arrange
        $form = factory(Form::class)->states('published')->create();

        $form->questions()->saveMany([
            factory(Question::class)->make([
                'name' => 'first_name',
                'label' => 'What is you first Name',
                'type' => 'textbox'
            ])
        ]);

        //Act
        $this->visit("/forms/" . $form->id);

        //Assert
        $this->seeElement("input", [
            "name" => "first_name",
            "type" => "text"
        ]);
    }
}
