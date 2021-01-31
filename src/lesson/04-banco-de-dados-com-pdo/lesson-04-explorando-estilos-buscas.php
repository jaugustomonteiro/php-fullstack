<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Explorando estilos de buscas");

use Source\Classes03\Database\Connect;

$connect = Connect::getInstance();

lesson_title("Fetch", __LINE__);

try {
    $read = $connect->query("SELECT * FROM users LIMIT 3");

    if(!$read->rowCount()) {
        throw new PDOException("Não obteve resultados");
    }

    //var_dump($read->fetch());

    while($user = $read->fetch()) {
        var_dump($user);
    }

} catch (PDOException $exception) {
    lesson_message("{$exception->getMessage()}", "danger");
}



lesson_title("Fetch all", __LINE__);

echo '
<pre>
while($user = $read->fetchAll()) {
    var_dump($user);
}
</pre>
';


try {
    $read = $connect->query("SELECT * FROM users LIMIT 3, 2");

    if(!$read->rowCount()) {
        throw new PDOException("Não obteve resultados");
    }

    foreach ($read->fetchAll() as $user) {
        var_dump($user);
    }

} catch (PDOException $exception) {
    lesson_message("{$exception->getMessage()}", "danger");
}


lesson_title("Fetch save", __LINE__);

try {
    $read = $connect->query("SELECT * FROM users LIMIT 5, 1");

    if(!$read->rowCount()) {
        throw new PDOException("Não obteve resultados");
    }

    $result = $read->fetchAll();

    var_dump(
        $read->fetchAll(),
        $result,
        $result
    );

} catch (PDOException $exception) {
    lesson_message("{$exception->getMessage()}", "danger");
}

lesson_title("Fetch style", __LINE__);

try {
    $read = $connect->query("SELECT * FROM users LIMIT 1");   
    foreach ($read->fetchAll() as $user) {
        var_dump($user);
    }

    $read = $connect->query("SELECT * FROM users LIMIT 1");
    foreach ($read->fetchAll(PDO::FETCH_NUM) as $user) {
        var_dump($user);
    }

    $read = $connect->query("SELECT * FROM users LIMIT 1");
    foreach ($read->fetchAll(PDO::FETCH_ASSOC) as $user) {
        var_dump($user);
    }

 
    $read = $connect->query("SELECT * FROM users LIMIT 1");
    foreach ($read->fetchAll(PDO::FETCH_CLASS, \Source\Classes03\Database\Entity\UserEntity::class) as $user) {
        /**
         * @var \Source\Classes03\Database\Entity\UserEntity $user
         */
        var_dump(
            $user,
            $user->getFirst_name()
        );
    }
    

} catch (PDOException $exception) {
    lesson_message("{$exception->getMessage()}", "danger");
}


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";