<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Camada de manipulação 1");

use Source\Core\Message;

lesson_title("String", __LINE__);

$string = "Esssa é uma string, nela temos um under_score e um guarda-chuva";

$message = new Message();

echo $message->info(str_slug($string));
echo $message->info(str_studly_case($string));
echo $message->info(str_camel_case($string));


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";