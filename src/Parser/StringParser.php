<?php

declare(strict_types=1);

namespace Klnjmm\Parser;

class StringParser implements ParserInterface
{
    public function support(string $value): bool
    {
        return true;
    }

    public function parse(string $value): string
    {
        return $value;
    }
}