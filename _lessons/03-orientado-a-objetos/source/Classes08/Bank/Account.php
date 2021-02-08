<?php

namespace Source\Classes08\Bank;

use Source\Classes08\App\Message;
use Source\Classes08\App\User;

abstract class Account {

    protected $branch;
    protected $account;
    protected $client;
    protected $balance;

    /**
     * Account Constructor
     *
     * @param $branch
     * @param $account
     * @param User $client
     * @param $balance
     */
    protected function __construct($branch, $account, User $client, $balance) {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    /**
     * @return void
     */
    public function extract(): void {
        $extract = $this->balance >= 1 ? Message::SUCCESS : Message::DANGER;
        Message::show("Extrato: Saldo atual: {$this->toBRL($this->balance)}", $extract);
    }

    /**
     * @param  $value
     * @return string
     */
    protected function toBRL($value) : string {
        return "R$ " . number_format($value, 2, ",", ".");
    }

    /**
     * @param $value
     * @return void
     */
    abstract public function deposit($value);

    /**
     * @param [type] $value
     * @return void
     */
    abstract public function withDrawal($value);
}