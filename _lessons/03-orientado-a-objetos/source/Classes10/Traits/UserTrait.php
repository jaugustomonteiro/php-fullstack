<?php

namespace Source\Classes10\Traits;

trait UserTrait {

    private $user;

    /**
     * @return User
     */
    public function getUser(): User {
        return $this->user;
    }


    /**
     * @param $user
     * @return mixed $user
     */
    public function setUser(User $user): void {
        $this->user = $user;
    }
}