<?php
declare(strict_types=1);

namespace Klnjmm\tests\units;


class FieldAggregator extends \atoum
{
    public function test_it_aggregate_on_field()
    {
        $input = [
            'name' => 'far',
            'id' => '10',
            'date' => '2020-04-30',
        ];

        $input2 = [
            'name' => 'far',
            'id' => '3',
            'date' => '2020-04-25',
        ];

        $aggregateField = 'name';

        $expected = [
            'far' => [
                ['id' => '10', 'date' => '2020-04-30'],
                ['id' => '3', 'date' => '2020-04-25'],
            ]
        ];

        $this->newTestedInstance($aggregateField)->aggregate($input);
        $this->testedInstance->aggregate($input2);
        $this->array($this->testedInstance->getAggregateValues())->isEqualTo($expected);


    }
}