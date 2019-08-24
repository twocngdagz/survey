<?php

use App\Form;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class FormTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function forms_with_published_at_date_are_published()
    {
        //Arrange
        $publishedForm1 = factory(Form::class)->states('published')->create();
        $publishedForm2 = factory(Form::class)->states('published')->create();
        $unPublishedForm1 = factory(Form::class)->states('unpublished')->create();

        //Act
        $publishedForms = Form::published()->get();

        //Assert
        $this->assertTrue($publishedForms->contains($publishedForm1));
        $this->assertTrue($publishedForms->contains($publishedForm2));
        $this->assertFalse($publishedForms->contains($unPublishedForm1));
    }
}
