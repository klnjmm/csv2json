<?php

namespace Klnjmm;

class DoNothingFieldAggregator implements FieldAggregatorInterface
{
    private array $aggregateValues;

    public function __construct()
    {
        $this->aggregateValues = [];
    }

    public function aggregate(array $input): void
    {
        $this->aggregateValues[] = $input;
    }

    public function getAggregateValues(): array
    {
        return $this->aggregateValues;
    }
}
