<?php

declare(strict_types=1);

namespace Klnjmm;

use Klnjmm\Parser\NullableParser;
use Klnjmm\Parser\ParserInterface;

class FieldSpecificationParserFactory
{
    private ParserInterface $nullableParser;
    private array $availableParser;

    public function __construct(NullableParser $nullableParser, array $availableParser)
    {
        $this->nullableParser = $nullableParser;
        $this->availableParser = $availableParser;
    }

    public function build(array $rawSpecifications): iterable
    {
        $parsersByField = [];
        foreach ($rawSpecifications as $field => $specification) {
            $parsers = [];
            if (strpos($specification, '?') === 0) {
                $parsers[] = $this->nullableParser;
            }

            $specification = ltrim($specification, '?');
            // ?int => int
            if (false === isset($this->availableParser[$specification])) {
                throw new \Exception('Unknown data type ' . $specification);
            }

            $parsers[] = $this->availableParser[$specification];

            $parsersByField[$field] = $parsers;
        }

        return $parsersByField;
    }
}
