<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity{    
    /** @var int */
    protected $id;

    public function GetId(): int
    {
        return $this->id;
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $entities = $db->query(
            "SELECT * FROM ".static::getTableName()." WHERE id=:id;",
            [":id" => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->UnderScoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function UnderScoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function findAll(): array
    {
        $db = Db::getInstance();
        return $db->query("SELECT * FROM ".static::getTableName().";", [], static::class);
    }
    
    public function save(): void
    {
        $mappedPeroperties = $this->mapPropertiesToDbFormat();
        if($this->id !== null){
            $this->update($mappedPeroperties);
        }else{
            $this->insert($mappedPeroperties);
        }
    }

    public function update(array $mappedProperties): void
    {
        $column2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ":param".$index;
            $column2params[] = $column . " = ".$param;
            $params2values[":param" . $index] = $value;
            $index++;
        }
        /* SQL */
        var_dump($column2params);
        var_dump($params2values);
    }

    public function insert(array $mappedProperties): void
    {
        
    }

    public function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedPeroperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderScore = $this->camelCaseToUnderScore($propertyName);
            $mappedPeroperties[$propertyNameAsUnderScore] = $this->$propertyName;
        }

        return $mappedPeroperties;
    }

    public function camelCaseToUnderScore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    abstract protected static function getTableName(): string;
}