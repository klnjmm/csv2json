<?php

declare(strict_types=1);

namespace Klnjmm;

class RowParser
{
    private FieldParserInterface $fieldParser;

    public function __construct(FieldParserInterface $fieldParser)
    {
        $this->fieldParser = $fieldParser;
    }

    public function parseRow(array $row): array
    {
        $parsedRow = [];
        foreach ($row as $field => $value) {
            $parsedRow[$field] = $this->fieldParser->parse($field, $value);
        }

        return $parsedRow;
    }
}
