<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Erros, conexão e execução");

lesson_title("Controle de erros", __LINE__);

try {
    // throw new Exception("Exception");
    // throw new PDOException("PDOException");
    throw new ErrorException("ErrorException");
} catch (PDOException | ErrorException $exception) {
    var_dump($exception);
}
catch (Exception $exception) {
    lesson_message("{$exception->getMessage()}", "danger");
}
finally {
    lesson_message("Finally", "warning");
}


lesson_title("PDO - PHP Data Object", __LINE__);

try {
    $pdo = new PDO(
        "mysql:host=17.0.0.2;dbname=phpfullstack",
        "root",
        "root",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ]
    );

    var_dump(get_class_methods($pdo));

    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");

    // while($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //    var_dump($user); 
    // }

    while($user = $stmt->fetch(PDO::FETCH_OBJ)) {
        var_dump($user); 
     }




} catch (PDOException $exception) {
    var_dump($exception);
}


lesson_title("Conexão com Singleton", __LINE__);


use Source\Classes03\Database\Connect;

$pdo1 = Connect::getInstance();
$pdo2 = Connect::getInstance();

var_dump(
    $pdo1,
    $pdo2,
    Connect::getInstance()::getAvailableDrivers(),
    Connect::getInstance()->getAttribute(PDO::ATTR_DRIVER_NAME)
);

lesson_tag("Finally");

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";