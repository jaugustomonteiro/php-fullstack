<?php

namespace Source\Classes08\Bank;

use Source\Classes08\App\Message;
use Source\Classes08\App\User;

class AccountSaving extends Account {
    
    private $interest;

    /**
     * AccountSaving Contructor
     * 
     * @param $branch
     * @param $account
     * @param User $client
     * @param $balance
     */
    public function __construct($branch, $account, User $client, $balance) {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }

    /**
     * @param $value
     * @return void
     */
    public function deposit($value) {
        $this->balance = $value + ($value * $this->interest);
        Message::show("Desposito de {$this->toBRL($value)} ralizado com sucesso", Message::SUCCESS);
    }

    /**
     * @param $value
     * @return void
     */
    public function withDrawal($value) {
        if($this->balance >= $value) {
            $this->balance -= abs($value);
            Message::show("Saque {$this->toBRL($value)} realizado com sucesso", Message::SUCCESS);
        }
        else {
            Message::show("Saldo insuficiente, você tem {$this->toBRL($this->balance)}", Message::DANGER);
        }
    }
}