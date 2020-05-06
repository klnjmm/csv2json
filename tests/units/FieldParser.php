<?php

declare(strict_types=1);

namespace Klnjmm\tests\units;


use Klnjmm\Parser\IntegerParser;

class FieldParser extends \atoum
{
    public function test_it_returns_value_if_specification_is_not_present_for_this_key()
    {
        $fieldSpecifications = [];
        $this->newTestedInstance($fieldSpecifications);
        $this->string($this->testedInstance->parse('unknown_spec', 'value'))->isIdenticalTo('value');
    }

    public function test_it_returns_parsed_value_if_specification_is_known()
    {
        $integerParser = new IntegerParser();
        $fieldSpecifications = ['id' => [$integerParser]];

        $this->newTestedInstance($fieldSpecifications);
        $this->integer($this->testedInstance->parse('id', '5'))->isIdenticalTo(5);
    }

    public function test_it_throws_an_exception_if_value_is_in_incorrect_format()
    {
        $integerParser = new IntegerParser();
        $fieldSpecifications = ['id' => [$integerParser]];

        $this->newTestedInstance($fieldSpecifications);
        $this->exception(function() {
            $this->testedInstance->parse('id', 'aa');
        });
    }
}