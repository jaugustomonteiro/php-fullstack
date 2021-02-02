<?php

namespace Source\Models;

use Source\Core\Model;

class User extends Model {
    
    /** @var array $safe no update or create */
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "users";

    /** @var array table fileds */
    protected static $required = ["first_name", "last_name", "email", "password"];

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     * @param string $document
     * @return User|null
     */
    public function bootstrap(string $firstName, string $lastName, string $email, string $password, string $document  = null): ?User {

        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->document = $document;


        return $this;
    }

    /**
     * @param string $terms
     * @param string $params
     * @param string $columns
     * @return User|null
     */
    public function find(string $terms, string $params, string $columns = "*"): ?User {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE {$terms}", $params);
        if($this->fail() || !$find->rowCount()) {
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }


    /**
     * @param integer $id
     * @param string $columns
     * @return UserModel|null
     */
    public function findById(int $id, string $columns = "*"): ?User {

        return $this->find("id = :id", "id={$id}", $columns);

        // $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE id = :id", "id={$id}");
        // if($this->fail() || !$load->rowCount()) {
        //     $this->message = "Usuário não encotrado para o id informado";
        //     return null;
        // }

        // return $load->fetchObject(__CLASS__);
    }

    /**
     * @param [type] $email
     * @param string $columns
     * @return UserModel|null
     */
    public function findByEmail($email, string $columns = "*"): ?User {   
        
        return $this->find("email = :email", "email={$email}", $columns);

        // $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");
        // if($this->fail() || !$find->rowCount()) {
        //     $this->message = "Usuário não encotrado para o email informado";
        //     return null;
        // }

        // return $find->fetchObject(__CLASS__);
    }


    /**
     * @param integer $limit
     * @param integer $offset
     * @param string $columns
     * @return array|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array {

        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");
        if($this->fail() || !$all->rowCount()) {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return UserModel|null
     */
    public function save(): ?User {
        
        if (!$this->required()) {
            $this->message->warning("Nome, sobrenome, email e senha são obrigatórios");
            return null;
        }

        if(!is_email($this->email)) {
            $this->message->warning("E-mail inválido");
            return null;
        }

        /**
         * if (!is_passwd($this->password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->warning("A senha deve ter entre {$min} e {$max} caracteres");
            return null;
        } else {
            $this->password = passwd($this->password);
        }
         */

        if(!is_passwd($this->password)) {            
            $min = CONF_PASSWORD_MIN_LEN;
            $max = CONF_PASSWORD_MAX_LEN;
            $this->message()->warning("A senha deve ter entre {$min} e {$max} caracteres");
            return null;
        }
        else {
            $this->password = passwd($this->password);
        }
        
        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;
            //$email = $this->read("SELECT id FROM users WHERE email = :email AND id != :id", "email={$this->email}&id={$userId}");

            if ($this->find("email = :e AND id != :i", "e={$this->email}&i={$userId}")) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return null;
            }            
        }

        /** User create */
        if(empty($this->id)) {
            if($this->findByEmail($this->email)) {
                $this->message->warning("O E-mail informado já está cadastrado");
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());
            if($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados"); 
                return null;               
            }
        }
        $this->data = ($this->findById($userId))->data();
        //$this->data = $this->read("SELECT * FROM users WHERE id = :id", "id={$userId}")->fetch();
        return $this;
        
    }

    /**
     * @return UserModel|null
     */
    public function destroy(): ?User {
        
        if(!empty($this->id)) {
            $this->delete(self::$entity, "id = :id", "id={$this->id}");
        }

        if($this->fail()) {
            $this->message = "Não foi possível remover o usuário";
            return null;
        }

        $this->message = "Usuário removido com sucesso";
        $this->data = null;
        return $this;
    }

}