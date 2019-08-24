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
}
