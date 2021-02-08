<?php

namespace Source\Classes04;

class Product {
    
    public $name;
    private $price;
    private $data;


    public function __set($name, $value) {
        $this->notFound(__FUNCTION__, $name);
        $this->data[$name] = $value;
    }

    public function __get($name) {
        if(!empty($this->data[$name])) {
            return $this->data[$name];
        }
        else {
            $this->notFound(__FUNCTION__, $name);
        }      
    }
    
    public function __isset($name) {
        $this->notFound(__FUNCTION__, $name);
    }

    public function __call($name, $arguments) {
        $this->notFound(__FUNCTION__, $name);
        var_dump($arguments);
        
    }

    public function __toString() {
        return "<p>Name: {$this->name} - Price: {$this->price} - Data: " . implode(', ', $this->data) . "</p>";
    }

    public function __unset($name) {
        //$this->notFound(__FUNCTION__, $name);
        trigger_error(__FUNCTION__ . ": Acesso negado a propriedade {$name}", E_USER_ERROR);
    }


    public function handler($name, $price) {
        $this->name = $name;
        $this->price = "R$ " . number_format($price, 2 , '.', ',');
    }

    private function notFound($method, $name) {
        lesson_message("<strong>{$method}&nbsp;</strong>: A propriedade<strong>&nbsp;{$name}&nbsp;</strong>não existe em<strong>&nbsp;" .  __CLASS__ . "!</strong>", "danger");
    }
}