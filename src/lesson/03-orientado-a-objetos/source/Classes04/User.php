<?php

namespace Source\Classes04;

class User {

    private $firstName;

    private $lastName;

    private $email;
   

    /**
     * User Constructor
     * @param [type] $firstName
     * @param [type] $lastName
     * @param [type] $email
     */
    public function __construct($firstName, $lastName, $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function __clone() {
        $this->firstName = null;
        $this->lastName = null;
        $this->email = "clone@clone.com";        
    }

    public function __destruct() {   
        echo "<div class='container'>";     
        lesson_message("Objeto {$this->firstName} foi destruido");
        var_dump($this);
        echo "</div>";     
    }

    /**
     * 
     * @return mixed
     */
    public function getFirstName() {
        return $this->firstName;
    }    

    /**
     *
     * @return mixed
     */
    public function getLastName()  {
        return $this->lastName;
    }
    
    /**
     *
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

   


    /**
     *
     * @param mixed  $firstName
     */ 
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    /**
     *
     * @param mixed  $lastName
     */ 
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     *
     * @param mixed  $email
     */ 
    public function setEmail($email) {
        $this->email = $email;
    }
}