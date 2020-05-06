<?php

declare(strict_types=1);

namespace Klnjmm\tests\units;


use Klnjmm\Parser\IntegerParser;

class RowParser extends \atoum
{
    public function test_it_returns_parsed_row()
    {
        $row = [ 'name' => 'foo', 'id' => '5'];

        $fieldParser = $this->newMockInstance(\Klnjmm\FieldParserInterface::class);
        $this->calling($fieldParser)->parse = function($key, $value) {
            return $value;
        };
        $this->newTestedInstance($fieldParser);

        $this->array($this->testedInstance->parseRow($row))
            ->isEqualTo($row)
            ->mock($fieldParser)
                ->call('parse')->withArguments('id', '5')->once()
                ->call('parse')->withArguments('name', 'foo')->once()
            ;




    }
}