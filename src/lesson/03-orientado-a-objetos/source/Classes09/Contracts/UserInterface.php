<?php

namespace Source\Classes09\Contracts;

interface UserInterface {
    
    /**
     * UserInterface Constructor
     *
     * @param [type] $firstName
     * @param [type] $lastName
     * @param [type] $email
     */
    // public function __construct($firstName, $lastName, $email, $password);

    // /**
    //  * @param [type] $email
    //  * @return void
    //  */
    // public function setEmail($email);

    /**
     * @return mixed
     */
    public function getFirstName();

    /**
     * @return mixed
     */
    public function getLastName();

    /**
     * @return mixed
     */
    public function getEmail();
}