<?php

declare(strict_types=1);

namespace Klnjmm\Parser;


class IntegerParser implements ParserInterface
{
    public function support(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public function parse(string $value): int
    {
        return (int) $value;
    }
}