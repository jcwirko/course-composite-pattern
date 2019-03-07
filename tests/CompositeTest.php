<?php

namespace Styde\Tests;

use Styde\Html\{
    Form,
    Fieldset,
    Legend,
    Textarea
};

class CompositeTest extends TestCase
{

    /** @test */
    function it_generates_nested_html()
    {
        $form = new Form();

        $contentFieldset = new Fieldset;

        $legend = new Legend('Contenido');

        $contentFieldset->add($legend);

        $textarea = new Textarea('content');

        $contentFieldset->add($textarea);

        $form->add($contentFieldset);

        $expected = <<<HTML
            <form>
                <fieldset>
                    <legend>Contenido</legend>
                     <textarea name="content"></textarea>
                </fieldset>
            </form>   
HTML;

        $this->assertSame($expected, $form->render);
    }

}