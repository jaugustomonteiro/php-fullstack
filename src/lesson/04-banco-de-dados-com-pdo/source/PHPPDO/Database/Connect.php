<?php

namespace Source\PHPPDO\Database;

use PDO;
use PDOException;

class Connect {
    
    private const HOST      = "17.0.0.2";

    private const DBNAME    = "phpfullstack";

    private const USER      = "root";    

    private const PASSWD    = "root";

    private const OPTIONS   = [
        PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8",
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_OBJ,
        PDO::ATTR_CASE                  => PDO::CASE_NATURAL,
    ];

    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstance(): PDO {
        if(empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );
            } catch (PDOException $exception) {
                lesson_message("Erro ao conectar...");
                die();
            }
        }
        return self::$instance;
        
    }

    /**
     * Undocumented function
     */
    final public function __construct() {
        
    }

    /**
     * Undocumented function
     * @return void
     */
    final public function __clone() {

    }




   
}