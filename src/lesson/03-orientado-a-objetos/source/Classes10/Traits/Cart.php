<?php

namespace Source\Classes10\Traits;

class Cart
{
    use UserTrait;
    use AddressTrait;

    private $products;
    private $cart;

    /**
     * @param $id
     * @param $product
     * @param $qtd
     * @param $price
     * @return void
     */
    public function add($id, $product, $qtd, $price) {
        $this->products[$id] = [
            "product" => $product,
            "qtd" => $qtd,
            "price" => $price,
            "total" => $qtd * $price
        ];

        $this->cart += $qtd * $price;
    }

    /**
     * @param $id
     * @param $qtd
     * @return void
     */
    public function remove($id, $qtd) {
        $this->cart -= $qtd * $this->products[$id]["price"];

        if ($this->products[$id]["qtd"] > $qtd) {
            $this->products[$id]["qtd"] -= $qtd;
            $this->products[$id]["total"] = $this->products[$id]["qtd"] * $this->products[$id]["price"];
        } else {
            unset($this->products[$id]);
        }
    }

    /**
     * @param User $user
     * @param Address $address
     * @return void
     */
    public function checkout(User $user, Address $address) {
        $this->setUser($user);
        $this->setAddress($address);
    }
}