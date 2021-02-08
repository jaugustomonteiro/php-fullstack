<?php

use Source\Classes03\Database\Connect;

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Desmistificando transações");

lesson_title("Transaction", __LINE__);

try {
    $pdo = Connect::getInstance();
    $pdo->beginTransaction();
    $insertUser = "INSERT INTO users (first_name,last_name,email,document) VALUES ('Augusto','Monteiro','jamonteirolima@gmail.com','2525555')";
    $pdo->query($insertUser);

    $userId = $pdo->lastInsertId();
    $insertAddress = "INSERT INTO users_address (`user_id`, street, number, complement) VALUES ('{$userId}', 'Rua 1', '1', 'Complemento 1')";
    $pdo->query($insertAddress);

    $pdo->commit();

    lesson_message("Transação realizada com sucesso", "success");
} catch (PDOException $exception) {
    $pdo->rollBack();
    lesson_message("{$exception->getMessage()}", "danger");
}


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";