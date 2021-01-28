<?php

namespace Source\Qualifield;

class User {

    private $firstName;

    private $lastName;

    private $email;

    private $error;

    public function setUser($firstName, $lastName, $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        
        if(!$this->setEmail($email)) {
            $this->error = "E-mail inválido";  
            return false;          
        }
        $this->email = $email;        
        return true;
    }

     /**
     *
     * @return void
     */
    public function getFirstName() {
        return $this->firstName;
    }  
    
    /**
     *
     * @param [type] $firstName
     * @return void
     */
    private function setFirstName($firstName) {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRIPPED);
    }  

     
    /**
     *
     * @return string|null
     */
    public function getLastName(): ?string {
        return $this->lastName;
    }
   
    /**
     *
     * @param [type] $lastName
     * @return void
     */
    private function setLastName($lastName) {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRIPPED);    
    }

    /**
     *
     * @return void
     */
    public function getEmail()  {
        return $this->email;
    }

    /**
     * validate email valid formatted
     * @param [type] $email
     * @return string|null
     */
    private function setEmail($email)  {        
        $this->email = $email;      
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else {
            return false;
        }             
    }

    /**
     * 
     * @return void
     */
    public function getError() {
        return $this->error;
    }

    /**
     *
     * @return string
     */
    public function __toString() {
        return "<p>O E-mail de <strong>{$this->firstName} {$this->lastName}</strong> é <strong>{$this->email}</strong></p>";
    }    
}