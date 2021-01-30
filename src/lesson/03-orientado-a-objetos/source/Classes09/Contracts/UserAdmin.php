<?php

namespace Source\Classes09\Contracts;

class UserAdmin extends User implements UserInterface, UserErrorInterface { 

    private $level;
    private $error;

    public function __construct($firstName, $lastName, $email) {
        parent::__construct($firstName, $lastName, $email);
        $this->level = 10;
    }

    /**
     * @return mixed
     */
    public function getError() {
        return $this->error;
    }
    
    
    /**
     * @param [type] $error
     * @return void
     */
    public function setError($error) {
        $this->error = $error;
    }
  
}
