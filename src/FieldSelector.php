<?php

namespace Klnjmm;

class FieldSelector implements FieldSelectorInterface
{
    private array $selectedFields;

    public function __construct(array $selectedFields)
    {
        $this->selectedFields = array_flip($selectedFields);
    }

    public function select(array $input): array
    {
        return array_intersect_key($input, $this->selectedFields);
    }
}
