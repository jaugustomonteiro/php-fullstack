<?php

namespace Source\Classes08\App;

class User {

    private $firstName;

    private $lastname;


    /**
     * User Constructor
     *
     * @param $firstName
     * @param $lastname
     */
    public function __construct($firstName, $lastname) {
        $this->firstName = $firstName;
        $this->lastname = $lastname;
    }   

    /**
     * @return mixed
     */ 
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @return mixed
     */ 
    public function getLastname() {
        return $this->lastname;
    }
}