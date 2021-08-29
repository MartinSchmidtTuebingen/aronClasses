<?php

namespace Aron\Model;

use Aron\Core\DatabaseProvider;
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
        if (!empty($id)) {
            $selectString = "SELECT ";
            $columnNames = array_keys($this->properties);
            $selectString .= implode(", ", $columnNames);
            $selectString .= " FROM $this->baseTable WHERE IDX = ?";

            $loadStatement = DatabaseProvider::getDb()->prepare($selectString);
            $loadStatement->execute([$id]);
            $objectData = $loadStatement->fetch(PDO::FETCH_ASSOC);
            $this->assignData($objectData);
            $this->isLoaded = true;
        }

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
}
