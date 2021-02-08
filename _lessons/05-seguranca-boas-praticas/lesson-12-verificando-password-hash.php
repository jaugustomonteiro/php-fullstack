<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Verificando password co hash");

lesson_title("Hash", __LINE__);

$user = user()->findById(1);
//$user->password = 1233336;
$user->save();

var_dump(
    $user,
    password_get_info(123456),
    password_get_info(passwd(123456)),
);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";