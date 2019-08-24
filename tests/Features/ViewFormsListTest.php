<?php

use App\Form;
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
        $form = Form::create([
            "name" => "Application Form",
        ]);

        //Act
        $this->visit("/forms/" . $form->id);

        //Assert
        $this->see("Application Form");
    }

    /** @test */
    public function user_cannot_view_unpublished_form()
    {
        $form = Form::create([
            "name" => "Application Form",
            "published_at" => null
        ]);

        $this->get("/forms/" . $form->id);

        $this->assertResponseStatus(404);
    }
}
