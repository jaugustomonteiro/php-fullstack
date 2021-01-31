<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Configuração do projeto");

lesson_title("Configurações", __LINE__);

var_dump(get_defined_constants(true)['user']);

lesson_title("Refatoramento", __LINE__);

use Source\Core\Connect;
use Source\Models\User;

$read = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 1, 1");
$read->execute();

var_dump($read->fetch());

$user = (new User())->load(1);
var_dump($user);


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";