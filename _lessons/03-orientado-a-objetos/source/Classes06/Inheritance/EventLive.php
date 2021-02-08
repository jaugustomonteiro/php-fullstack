<?php

namespace Source\Classes06\Inheritance;

use Source\Classes06\Address;

class EventLive extends Event {

    /**
     * @var Address
     */
    private $address;

    /**
     * EventLive Constructor
     *
     * @param $event
     * @param \DateTime $date
     * @param $price
     * @param $vacancies
     * @param Address $address
     */
    public function __construct($event, \DateTime $date, $price, $vacancies, Address $address) {
        parent::__construct($event, $date, $price, $vacancies);
        $this->address = $address;
    }
    
    /**
     * @return Address
     */
    public function getAddress(): Address {
        return $this->address;
    }


}