<?php 

namespace Source\Classes06\Inheritance;

class Event {
        
    private $event;
    private $date;
    private $price;

    private $register;
    protected $vacancies;


    /**
     * Event constructor
     * @param $event
     * @param $date
     * @param $price
     * @param $vacancies
     */
    public function __construct($event, \DateTime $date, $price, $vacancies) {
        $this->event = $event;
        $this->date = $date;
        $this->price = $price;
        $this->vacancies = $vacancies;
    }

    /**
     * @param $fullName
     * @param $email
     * @return void
     */
    public function register($fullName, $email) {
        if($this->vacancies >= 1) {
            $this->vacancies -= 1;
            $this->setRegister($fullName, $email);
            lesson_message("Parabéns {$fullName}, mas as vasgas esgotaram!", "success");
        }
        else {
            lesson_message("Desculpe {$fullName}, mas as vasgas esgotaram!", "danger");
        }
    }

    /**
    *
     * @param $fullName
     * @param $email
     * @return void
     */
    protected function setRegister($fullName, $email): void {
        $this->register = [
            "name" => $fullName,
            "email" => $email,
        ];
    }

    /**
     * @return mixed
     */
    public function getEvent() {
        return $this->event;
    }

    /**
     * @return mixed
     */
    public function getDate() {
        return $this->date->format("d/m/Y H:i");
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return number_format($this->price, 2, ",", ".");
    }

    /**
     * @return mixed
     */
    public function getRegister() {
        return $this->register;
    }

    /**
     * @return mixed
     */
    public function getVacancies() {
        return $this->vacancies;
    }
}