<?php

require __DIR__.'/vendor/autoload.php';

$options = getopt('', ['pretty', 'fields:', 'aggregate:']);

$csvFile = new \SplFileObject(__DIR__.'/data.csv');
$csvReader = new \Klnjmm\CsvReader($csvFile);

$fieldSelector = new \Klnjmm\SameFieldSelector();
if (isset($options['fields'])) {
    $fieldSelector = new \Klnjmm\FieldSelector(explode(',', $options['fields']));
}

$fieldAggregator = new \Klnjmm\DoNothingFieldAggregator();
if (isset($options['aggregate'])) {
    $fieldAggregator = new \Klnjmm\FieldAggregator($options['aggregate']);
}

foreach ($csvReader->read() as $row) {
    $row = $fieldSelector->select($row);
    $fieldAggregator->aggregate($row);
}

$result = $fieldAggregator->getAggregateValues();

$jsonOptions = 0;
if (isset($options['pretty'])) {
    $jsonOptions = JSON_PRETTY_PRINT;
}

echo json_encode($result, $jsonOptions).PHP_EOL;
