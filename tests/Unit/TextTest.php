<?php

use App\Html\Elements\Text;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TextTest extends TestCase
{
    /** @test */
    public function it_should_render_a_text_input()
    {
        //Arrange
        $text = new Text(["type" => "text", "name" => "first_name"]);

        //Act
        $html = $text->render();

        //Assert
        $this->assertSame('<input type="text" name="first_name">', $html);
    }
}
