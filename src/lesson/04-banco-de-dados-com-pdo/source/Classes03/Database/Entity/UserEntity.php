<?php

namespace Source\Classes03\Database\Entity;

class UserEntity {
    
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $document;

    /**
     * @return mixed
     */
    public function getFirst_name() {
        return $this->first_name;
    }
}