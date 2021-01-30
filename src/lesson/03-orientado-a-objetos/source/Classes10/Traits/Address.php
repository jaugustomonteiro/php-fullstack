<?php

namespace Source\Classes10\Traits;

class Address {

    protected $street;

    protected $number;

    protected $complement;

    /**
     * @param street
     * @param number
     * @param complement
     */
    public function __construct($street, $number, $complement) {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }
    
    /**
     * @return mixed
     */ 
    public function getStreet() {
        return $this->street;
    }

    /**
     * @return mixed
     */ 
    public function getNumber() {
        return $this->number;
    }

    /**
     * @return mixed
     */ 
    public function getComplement() {
        return $this->complement;
    }
}