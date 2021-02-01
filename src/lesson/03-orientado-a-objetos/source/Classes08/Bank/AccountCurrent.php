<?php

namespace Source\Classes08\Bank;

use Source\Classes08\App\Message;
use Source\Classes08\App\User;

class AccountCurrent extends Account {

    private $limit;

    /**
     * AccountCurrent Constructor
     * 
     * @param $branch
     * @param $account
     * @param User $client
     * @param $balance
     * @param $limit
     */
    public function __construct($branch, $account, User $client, $balance, $limit) {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }


    /**
     * @param $value
     * @return void
     */
    final public function deposit($value) {
        $this->balance += $value;
        Message::show("Desposito de {$this->toBRL($value)} ralizado com sucesso", Message::SUCCESS);
    }

    /**
     * @param $value
     * @return void
     */
    final public function withDrawal($value) {
        if($value <= $this->balance + $this->limit) {
            $this->balance -= abs($value);
            Message::show("Sque de {$this->toBRL($value)} efetuado com sucesso", Message::SUCCESS);
            
            if($this->balance < 0) {
                $rate = abs($this->balance) * 0.006;
                $this->balance -= $rate;
                Message::show("Taxa de uso de limite {$this->toBRL($rate)}");
            }
        }
        else {
            $saving = $this->balance + $this->limit;
            Message::show("Saldo insuficiente, você tem {$this->toBRL($value)}");
        }
    }
}