<?php

declare(strict_types=1);

namespace Klnjmm\tests\units;

class DescriptionFileReader extends \atoum
{
    public function test_it_returns_field_specification()
    {
        $descFile = new \SplFileObject(__DIR__.'/fixtures/desc.ini');
        $expected = [
            'name' => 'string',
            'id' => '?int',
            'date' => 'datetime',
        ];

        $this->newTestedInstance($descFile);

        $this->array($this->testedInstance->read())->isEqualTo($expected);
    }

    public function test_it_throws_exception_if_desc_file_is_invalid()
    {
        $descFile = new \SplFileObject(__DIR__.'/fixtures/descInvalid.ini');
        $this->newTestedInstance($descFile);

        $this->exception(function() {
            $this->testedInstance->read();
        });
    }
}