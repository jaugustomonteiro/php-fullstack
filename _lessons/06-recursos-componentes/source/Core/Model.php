<?php

namespace Source\Core;

use PDOException;
use stdClass;

abstract class Model {

    /** @var object|null */
    protected $data;

    /** @var \PDOException|null */
    protected $fail;

    /** @var Message|null */
    protected $message;

    /**
     * Model Constructor
     */
    public function __construct() {
        $this->message = new Message();
    }
    
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
     * @return Message|null
     */
    public function message(): ?Message {
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
                                        
                    if($key == "limit" || $key == "offset") {
                        $stmt->bindValue(":{$key}", $value, \PDO::PARAM_INT);
                    }
                    else {
                        $stmt->bindValue(":{$key}", $value, \PDO::PARAM_STR);
                    }
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

    /**
     * @return boolean
     */
    protected function required(): bool {
        $data = (array)$this->data();
        foreach (static::$required as $filed) {
            if(empty($data[$filed])) {
                return false;
            }
        }
        return true;
    }

}