<?php

declare(strict_types=1);

namespace Klnjmm\tests\units\Parser;

class StringParser extends \atoum
{
    public function test_it_returns_true()
    {
        $input = 'value';
        $this->boolean($this->newTestedInstance->support($input))->isTrue;
    }

    public function test_it_returns_input()
    {
        $input = '42';
        $this->string($this->newTestedInstance->parse($input))->isIdenticalTo($input);
    }
}