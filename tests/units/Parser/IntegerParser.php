<?php

declare(strict_types=1);

namespace Klnjmm\tests\units\Parser;

class IntegerParser extends \atoum
{
    public function test_it_returns_true_if_input_is_integer()
    {
        $input = '42';
        $this->boolean($this->newTestedInstance->support($input))->isTrue;
    }

    public function test_it_returns_false_if_input_is_not_an_integer()
    {
        $input = 'a';
        $this->boolean($this->newTestedInstance->support($input))->isFalse;
    }

    public function test_it_parse_input_as_an_integer()
    {
        $input = '42';
        $expected = 42;

        $this->integer($this->newTestedInstance->parse($input))->isIdenticalTo($expected);
    }
}