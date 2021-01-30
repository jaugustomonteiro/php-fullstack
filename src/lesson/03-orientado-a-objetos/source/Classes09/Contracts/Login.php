<?php

namespace Source\Classes09\Contracts;

class Login {

    private $logged;

    /**
     * @param User $user
     * @return User
     */
    public function loginUser(User $user): User {
        $this->logged = $user;
        return $this->logged;
    }

    /**
     * @param UserAdmin $user
     * @return vUserAdmin
     */
    public function loginAdmin(UserAdmin $user): UserAdmin {
        $this->logged = $user;
        return $this->logged;
    }

    public function login(UserInterface $user): UserInterface {
        $this->logged = $user;
        return $this->logged;
    }
}