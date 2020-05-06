<?php

declare(strict_types=1);

namespace Klnjmm\Parser;


interface ParserInterface
{
    public function support(string $value): bool;

    public function parse(string $value);
}