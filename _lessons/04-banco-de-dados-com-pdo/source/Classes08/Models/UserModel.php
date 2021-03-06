<?php

namespace Source\Classes08\Models;

class UserModel extends Model {
    
    /** @var array $safe no update or create */
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "users";

    public function bootstrap() {

    }

    public function load(int $id, string $column = "*"): ?UserModel {
        $load = $this->read("SELECT {$column} FROM " . self::$entity . " WHERE id = :id", "id={$id}");
        if($this->fail() || !$load->rowCount()) {
            $this->message = "Usuário não encotrado para o id informado";
            return null;
        }

        return $load->fetchObject(__CLASS__);
    }

    public function find(string $email, string $column = "*"): ?UserModel {

        $find = $this->read("SELECT {$column} FROM " . self::$entity . " WHERE email = :email", "email={$email}");
        if($this->fail() || !$find->rowCount()) {
            $this->message = "Usuário não encotrado para o email informado";
            return null;
        }

        return $find->fetchObject(__CLASS__);
    }


    public function all(int $limit = 30, int $offset = 0, string $column = "*"): ?array {

        $all = $this->read("SELECT {$column} FROM " . self::$entity . " LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");
        if($this->fail() || !$all->rowCount()) {
            $this->message = "Nenhum usuário encontrado";
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function save() {

    }

    public function destroy() {

    }

    private function required() {
        
    }

}