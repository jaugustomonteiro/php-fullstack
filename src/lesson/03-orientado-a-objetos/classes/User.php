<?php

class User {

    public $firstName;

    public $lastName;

    public $email;

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
    public function setFirstName($firstName) {
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
    public function setLastName($lastName) {
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
    public function setEmail($email)  {  
        $this->email = $email;      
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else {
            return true;
        }       
                
    }

    /**
     *
     * @return string
     */
    public function __toString() {
        return "<p>O E-mail de <strong>{$this->firstName} {$this->lastName}</strong> é <strong>{$this->email}</strong></p>";
    }


   

    

   
    
}

