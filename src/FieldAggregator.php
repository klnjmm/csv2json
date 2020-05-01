<?php


namespace Klnjmm;


class FieldAggregator implements FieldAggregatorInterface
{
    private string $fieldName;

    private array $aggregateValues;

    public function __construct(string $fieldName)
    {
        $this->fieldName = $fieldName;
        $this->aggregateValues = [];
    }

    public function aggregate(array $input): void
    {
        $aggregateFieldValue = $input[$this->fieldName];
        unset($input[$this->fieldName]);

        if (false === isset($this->aggregateValues[$aggregateFieldValue])) {
            $this->aggregateValues[$aggregateFieldValue] = [];
        }

        $this->aggregateValues[$aggregateFieldValue][] = $input;
    }

    public function getAggregateValues(): array
    {
        return $this->aggregateValues;
    }
}