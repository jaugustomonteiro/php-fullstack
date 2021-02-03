<?php
require __DIR__ . "/../_shared/header.php";
require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Subtítulo");

lesson_title("Query params", __LINE__);

$user = user()->findById(1);

$user->document = 22.22;

$user->save();

var_dump($user);

$user = user()->find("document = :d", "d=22.22");

var_dump($user);

$list = user()->all(2);

var_dump($list);


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";