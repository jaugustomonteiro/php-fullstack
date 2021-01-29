<?php 

namespace Source\Classes05;

class Product {
    
    private $name;
    private $price;


    /**
     * Product Constructor
     *
     * @param  $name
     * @param $price
     */
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return  mixed $name
     */ 
    public function setName($name): void {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return number_format($this->price, 2, ',', '.');
    } 

    /**
     *
     * @return  mixed  $price
     */ 
    public function setPrice($price): void {
        $this->price = $price;
    }
}