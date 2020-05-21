<?php

namespace Klnjmm;

interface FieldAggregatorInterface
{
    public function aggregate(array $input): void;

    public function getAggregateValues(): array;
}
