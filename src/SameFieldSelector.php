<?php


namespace Klnjmm;


class SameFieldSelector implements FieldSelectorInterface
{

    public function select(array $input): array
    {
        return $input;
    }
}
