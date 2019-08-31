<?php

use App\Html\Elements\Text;
use App\Html\HtmlFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class HtmlFactoryTest extends TestCase
{
    /** @test */
    public function factory_should_instantiate_the_text_class_for_text_type()
    {
        $factory = new HtmlFactory();

        $inputClass = $factory->make('text', []);

        $this->assertInstanceOf(Text::class, $inputClass);
    }
}
