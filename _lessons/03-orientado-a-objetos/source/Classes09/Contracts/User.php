<?php

namespace Source\Classes09\Contracts;

class User implements UserInterface {

    private $firstName;

    private $lastName;

    private $email;

    /**
     * User Constructor
     *
     * @param $firstName
     * @param $lastName
     * @param $email
     */
    public function __construct($firstName, $lastName, $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
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
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @return mixed
     */ 
    public function getEmail() {
        return $this->email;
    }

     /**
      * @param $email
      * @return void
      */
      public function setEmail($email): void {
           $this->email = $email;
      }

    
}