<?php

declare(strict_types=1);

namespace Klnjmm\tests\units;


use Klnjmm\Parser\NullableParser;
use Klnjmm\Parser\ParserInterface;

class FieldSpecificationParserFactory extends \atoum
{
    public function test_it_convert_each_type_in_object()
    {
        $integerParser = $this->newMockInstance(ParserInterface::class);
        $stringParser = $this->newMockInstance(ParserInterface::class);
        $dateTimeParser = $this->newMockInstance(ParserInterface::class);
        $nullableParser = new NullableParser();

        $availableParsers = [
            'string' => $stringParser,
            'int' => $integerParser,
            'datetime' => $dateTimeParser,
        ];

        $fieldSpecifications = [
            'name' => 'string',
            'id' => '?int',
            'date' => 'datetime',
        ];

        $expected = [
            'name' => [$stringParser],
            'id' => [$nullableParser, $integerParser],
            'date' => [$dateTimeParser],
        ];

        $this->newTestedInstance($nullableParser, $availableParsers);

        $this->array($this->testedInstance->build($fieldSpecifications))
            ->isEqualTo($expected)
            ;
    }
}