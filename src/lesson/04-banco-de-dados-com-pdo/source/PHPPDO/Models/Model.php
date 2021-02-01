<?php

namespace Source\PHPPDO\Models;

use PDOException;
use Source\Classes08\Database\Connect;
use stdClass;

abstract class Model {

    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var string|null */
    protected $message;

    /**
     * @param [type] $name
     * @param [type] $value
     */
    public function __set($name, $value) {
        if(empty($this->data)) {
            $this->data = new stdClass();
        }

        $this->data->$name = $value;
    }

    /**
     * @param [type] $name
     * @return boolean
     */
    public function __isset($name) {
        return isset($this->data->$name);
    }

    /**
     * @param [type] $name
     * @return void
     */
    public function __get($name) {
        return ($this->data->$name ?? null);
    }

    /**
     * @return null|object
     */ 
    public function data(): ?object {
        return $this->data;
    }
    
    /**
     * @return \PDOException
     */ 
    public function fail(): ?\PDOException {
        return $this->fail;
    }

    /**
     * @return null|string
     */ 
    public function message(): ?string {
        return $this->message;
    }

    /**
     * @param string $entity
     * @param array $data
     * @return integer|null
     */
    protected function create(string $entity, array $data): ?int {

        try {

            $column = implode(", ", array_keys($data));

            $values = ":" . implode(", :", array_keys($data));

            $stmt = Connect::getInstance()->prepare("INSERT INTO {$entity} ({$column}) VALUES ({$values})");

            $stmt->execute($this->filter($data));

            return Connect::getInstance()->lastInsertId();

        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }       
    }

    /**
     * @param string $select
     * @param string $params
     * @return \PDOStatement|null
     */
    protected function read(string $select, string $params = null): ?\PDOStatement {
        try {
            $stmt = Connect::getInstance()->prepare($select);

            if($params) {               
                parse_str($params, $arrayParams);
                foreach ($arrayParams as $key => $value) {
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }
            $stmt->execute();
            return $stmt;

        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    /**
     * @param string $entity
     * @param array $data
     * @param string $terms
     * @param string $params
     * @return integer|null
     */
    protected function update(string $entity, array $data, string $terms, string $params): ?int {
        try {
            $dateSet = [];
            foreach ($data as $bind => $value) {
                $dateSet[] = "{$bind} = :{$bind}";
            }
            $dateSet = implode(", ", $dateSet);
            parse_str($params, $arrayParams);

            $stmt = Connect::getInstance()->prepare("UPDATE {$entity} SET {$dateSet} WHERE {$terms}");
            $stmt->execute($this->filter(array_merge($data, $arrayParams)));
            return ($stmt->rowCount() ?? 1);
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    /**
     * @param string $entity
     * @param string $terms
     * @param string $params
     * @return integer|null
     */
    protected function delete(string $entity, string $terms, string $params): ?int {

        try {
            $stmt = Connect::getInstance()->prepare("DELETE FROM {$entity} WHERE {$terms}");
            parse_str($params, $arrayParams);
            $stmt->execute($arrayParams);
            return ($stmt->rowCount() ?? 1);
        }  catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }        
    }

    /**
     * @return array|null
     */
    protected function safe(): ?array {
        $safe = (array)$this->data;
        foreach (static::$safe as $unset) {
           unset($safe[$unset]);
        }
        return $safe;
    }

    /**
     * @param array $data
     * @return array|null
     */
    private function filter(array $data): ?array {
        
        $filter = [];

        foreach($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
        }

        return $filter;
    }

}