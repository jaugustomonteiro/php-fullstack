<?php

namespace Source\Classes10\Traits;

trait AddressTrait {

    /** @var Address */
    private $address;

    /**
     * @return  Address
     */ 
    public function getAddress(): Address {
        return $this->address;
    }

    /**
     * @param $address
     * @return void
     */
    public function setAddress(Address $address): void {
        $this->address = $address;
    }
}