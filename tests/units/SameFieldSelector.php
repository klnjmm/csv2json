<?php


namespace Klnjmm\tests\units;


class SameFieldSelector extends \atoum
{
    public function test_only_selected_field_are_return()
    {
        $input = [
            'name' => 'far',
            'id' => '10',
            'date' => '2020-04-30',
        ];

        $this->array($this->newTestedInstance()->select($input))
            ->isEqualTo($input)
        ;
    }
}