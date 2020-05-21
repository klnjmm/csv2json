<?php

declare(strict_types=1);

namespace Klnjmm\Parser;

class NullableParser implements ParserInterface
{
    public function support(string $value): bool
    {
        return $value === '';
    }

    public function parse(string $value)
    {
        return null;
    }
}
