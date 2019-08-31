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
        $form = factory(Form::class)->states('published')->create();

        $form->questions()->saveMany([
            factory(Question::class)->make([
                'name' => 'first_name',
                'label' => 'What is you first Name',
                'type' => 'text'
            ])
        ]);

        $this->visit("/forms/" . $form->id);

        $this->seeElement("input", [
            "name" => "first_name",
            "type" => "text"
        ]);

        $this->seeElement("input", [
            "type" => "submit"
        ]);
    }

    /** @test */
    public function user_can_view_a_textarea_in_the_form()
    {
        $form = factory(Form::class)->states('published')->create();

        $form->questions()->saveMany([
            factory(Question::class)->make([
                'name' => 'description',
                'label' => 'Description',
                'type' => 'textarea'
            ])
        ]);

        $this->visit("/forms/" . $form->id);

        $this->seeElement("textarea", [
            "name" => "description"
        ]);

        $this->seeElement("input", [
            "type" => "submit"
        ]);
    }

    /** @test */
    public function user_can_view_a_input_type_radio_in_the_form()
    {
        $form = factory(Form::class)->states('published')->create();

        $form->questions()->saveMany([
            factory(Question::class)->make([
                'name' => 'gender',
                'label' => 'Gender',
                'type' => 'radio',
                'options' => [
                    "male" => "Male",
                    "female" => "Female",
                    "other" => "Other"
                ]
            ])
        ]);

        $this->visit("/forms/" . $form->id);

        $this->seeElement("input", [
            "type" => "radio",
            "name" => "gender"
        ]);

        $this->seeElement("input", [
            "type" => "radio",
            "value" => "male"
        ]);

        $this->seeElement("input", [
            "type" => "radio",
            "value" => "female"
        ]);

        $this->seeElement("input", [
            "type" => "radio",
            "value" => "other"
        ]);

        $this->seeElement("input", [
            "type" => "submit"
        ]);

        $this->see("Male");
        $this->see("Female");
        $this->see("Other");
    }

    /** @test */
    public function user_can_view_input_type_select_in_the_form()
    {
        //Arrange
        $form = factory(Form::class)->states('published')->create();

        $form->questions()->saveMany([
            factory(Question::class)->make([
                'name' => 'gender',
                'label' => 'Gender',
                'type' => 'select',
                'options' => [
                    "male" => "Male",
                    "female" => "Female",
                    "other" => "Other"
                ]
            ])
        ]);

        //Act
        $this->visit("/forms/" . $form->id);

        //Assert
        $this->seeElement("select", [
            "name" => "gender"
        ]);

        $this->seeElement("option", [
            "value" => "male"
        ]);

        $this->seeElement("option", [
            "value" => "female"
        ]);

        $this->seeElement("option", [
            "value" => "other"
        ]);

        $this->seeElement("input", [
            "type" => "submit"
        ]);

        $this->see("Male");
        $this->see("Female");
        $this->see("Other");
    }
}
