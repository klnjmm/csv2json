<?php

namespace Klnjmm;

class CsvReader
{
    private \SplFileObject $csvFile;

    public function __construct(\SplFileObject $csvFile)
    {
        $this->csvFile = $csvFile;
    }

    public function read(): iterable
    {
        $this->csvFile->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE |
            \SplFileObject::READ_AHEAD
        );
        $this->csvFile->setCsvControl(';');

        $data = [];
        $headersSet = false;
        $headers = [];
        foreach ($this->csvFile as $row) {
            if ($headersSet === false) {
                $headers = $row;
                $headersSet = true;
                continue;
            }

            $data[] = array_combine($headers, $row);
        }

        return $data;
    }
}
