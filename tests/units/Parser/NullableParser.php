<?php

declare(strict_types=1);

namespace Klnjmm\tests\units\Parser;

class NullableParser extends \atoum
{
    public function test_it_returns_true_if_input_is_empty_string()
    {
        $input = '';
        $this->boolean($this->newTestedInstance->support($input))->isTrue;
    }

    public function test_it_returns_false_if_input_is_not_an_empty_string()
    {
        $input = '42';
        $this->boolean($this->newTestedInstance->support($input))->isFalse;
    }

    public function test_it_returns_null()
    {
        $input = '';
        $this->variable($this->newTestedInstance->parse($input))->isNull;
    }
}