<?php


namespace Klnjmm\tests\units;


class FieldSelector extends \atoum
{
    /** @dataProvider inputDataProvider */
    public function test_only_selected_field_are_return(array $fieldList, array $expected)
    {
        $input = [
            'name' => 'far',
            'id' => '10',
            'date' => '2020-04-30',
        ];

        $this->array($this->newTestedInstance($fieldList)->select($input))
            ->isEqualTo($expected)
        ;
    }

    public function inputDataProvider()
    {
        return [
            [
                ['name', 'id'],
                [
                    'name' => 'far',
                    'id' => '10',
                ],
            ],
            [
                [],
                [],
            ],
        ];
    }
}