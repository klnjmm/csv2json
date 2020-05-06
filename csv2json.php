<?php

require __DIR__.'/vendor/autoload.php';

$options = getopt('', ['pretty', 'fields:', 'aggregate:', 'desc:']);

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

$fieldSpecifications = [];
if (isset($options['desc'])) {
    $descriptionFile = new \SplFileObject($options['desc']);
    $descriptionFileReader = new \Klnjmm\DescriptionFileReader($descriptionFile);
    $fieldSpecifications = $descriptionFileReader->read();
}

$nullableParser = new \Klnjmm\Parser\NullableParser();
$integerParser = new \Klnjmm\Parser\IntegerParser();
$stringParser = new \Klnjmm\Parser\StringParser();
$availableParsers = [
    'int' => $integerParser,
    'integer' => $integerParser,
    'string' => $stringParser,
];

$fieldSpecificationParserFactory = new \Klnjmm\FieldSpecificationParserFactory($nullableParser, $availableParsers);
$fieldSpecifications = $fieldSpecificationParserFactory->build($fieldSpecifications);

$fieldParser = new \Klnjmm\FieldParser($fieldSpecifications);
$rowParser = new \Klnjmm\RowParser($fieldParser);


foreach ($csvReader->read() as $row) {
    $row = $fieldSelector->select($row);
    $row = $rowParser->parseRow($row);
    $fieldAggregator->aggregate($row);
}

$result = $fieldAggregator->getAggregateValues();

$jsonOptions = 0;
if (isset($options['pretty'])) {
    $jsonOptions = JSON_PRETTY_PRINT;
}

echo json_encode($result, $jsonOptions).PHP_EOL;
