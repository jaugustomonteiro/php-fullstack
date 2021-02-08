<?php

namespace Source\Classes06\Inheritance;

class EventOnline extends Event {

    private $link;

    public function __construct($event, \DateTime $date, $price, $link, $vacancies = null) {
        parent::__construct($event, $date, $price, $vacancies);
        $this->link = $link;
    }

    
    public function register($fullName, $email) {
        $this->vacancies += 1;
        $this->setRegister($fullName, $email);
        lesson_message("Show!!! {$fullName}, cadastrado com sucesso!", "success");
    }
}