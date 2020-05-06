<?php

declare(strict_types=1);

namespace Klnjmm;


class FieldParser implements FieldParserInterface
{
    private array $fieldSpecifications;

    public function __construct(array $fieldSpecifications)
    {
        $this->fieldSpecifications = $fieldSpecifications;
    }

    public function parse(string $key, string $value)
    {
        if (false === isset($this->fieldSpecifications[$key])) {
            return $value;
        }

        foreach ($this->fieldSpecifications[$key] as $parser) {
            if ($parser->support($value)) {
                return $parser->parse($value);
            }
        }

        throw new \Exception('Invalid format');
    }
}