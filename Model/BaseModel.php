<?php

namespace Aron\Model;

use Aron\Core\DatabaseProvider;
use Aron\Core\Registry;
use PDO;

abstract class BaseModel
{
    protected $baseTable = '';

    protected $properties = [];

    public $isLoaded = false;

    public function getId(): string
    {
        return $this->properties['IDX'];
    }

    public function getValue(string $valueName)
    {
        if (isset($this->properties[$valueName])) {
            return $this->properties[$valueName];
        } else {
            return null;
        }
    }

    public function load(string $id): bool
    {
        if (empty($id)) {
            return false;
        }
        $selectString = "SELECT ";
        $columnNames = array_keys($this->properties);
        $selectString .= implode(", ", $columnNames);
        $selectString .= " FROM $this->baseTable WHERE IDX = ?";

        $loadStatement = DatabaseProvider::getDb()->prepare($selectString);
        $loadStatement->execute([$id]);
        $objectData = $loadStatement->fetch(PDO::FETCH_ASSOC);
        $this->assignData($objectData);

        $this->isLoaded = true;

        return $this->isLoaded;
    }

    public function assignData(array $data)
    {
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $this->properties)) {
                $this->properties[$key] = $value;
            } else {
                $this->$key = $value;
            }
        }
    }

    public function save()
    {
        if (!$this->properties['IDX']) {
            $this->setId();
        }

        $columnNames = array_keys($this->properties);
        $columNamesString = implode(", ", $columnNames);

        $properties = array_values($this->properties);

        $placeHolders = [];
        foreach ($properties as $property) {
            $placeHolders[] = '?';
        }

        $placeHoldersAsString = implode(", ", $placeHolders);

        $selectString = "INSERT INTO $this->baseTable ($columNamesString) VALUES ($placeHoldersAsString)";

        echo $selectString;

        $insertStatement = DatabaseProvider::getDb()->prepare($selectString);
        return $insertStatement->execute($properties);
    }

    public function setId(?string $idx = null): string
    {
        if (!$idx) {
            $idx = Registry::getUtils()->generateUId();
        }

        $this->properties['IDX'] = $idx;

        return $idx;
    }
}
