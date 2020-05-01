<?php


namespace Klnjmm\tests\units;


class CsvReader extends \atoum
{
    public function test_it_returns_empty_array_if_csv_file_is_empty()
    {
        $this
            ->given(
                $emptyCsvFile = new \SplFileObject(__DIR__.'/fixtures/empty.csv')
            )
            ->if(
                $this->newTestedInstance($emptyCsvFile)
            )
            ->then
                ->array($this->testedInstance->read())->isEmpty
        ;
    }

    public function test_it_returns_data_in_array_if_csv_file_contains_data()
    {
        $csvFile = new \SplFileObject(__DIR__.'/fixtures/data.csv');
        $expected = [
            [
                'name' => 'foo',
                'id' => '5',
                'date' => '2020-05-03',
            ]
        ];

        $this->array(
            $this->newTestedInstance($csvFile)->read()
        )->isEqualTo($expected);
    }
}