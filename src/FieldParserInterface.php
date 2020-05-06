<?php

declare(strict_types=1);

namespace Klnjmm;

interface FieldParserInterface
{
    public function parse(string $key, string $value);
}