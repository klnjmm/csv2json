<?php

declare(strict_types=1);

namespace Klnjmm;


class DescriptionFileReader
{
    private \SplFileObject $descriptionFile;

    public function __construct(\SplFileObject $descriptionFile)
    {
        $this->descriptionFile = $descriptionFile;
    }

    public function read()
    {
        $this->descriptionFile->setFlags(\SplFileObject::READ_AHEAD | \SplFileObject::DROP_NEW_LINE | \SplFileObject::SKIP_EMPTY);

        $rowDescription = [];
        foreach($this->descriptionFile as $row) {

            $rowInformations = explode('#', $row);
            if (trim($rowInformations[0]) === '') {
                continue;
            }

            $rowDescription[] = $rowInformations[0];
        }

        $fieldSpecification = @parse_ini_string(implode(PHP_EOL, $rowDescription));
        if (false === $fieldSpecification) {
            throw new \Exception('Description file is invalid');
        }

        return $fieldSpecification;

    }
}