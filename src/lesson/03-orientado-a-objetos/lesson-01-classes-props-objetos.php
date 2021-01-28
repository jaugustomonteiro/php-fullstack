<?php

require __DIR__ . "/../_shared/header.php";

heder_lesson("PHP Orientado a Objetos <br> Classes, propriedades e objetos");

lesson_title($title = "Classes e objetos", __LINE__);

require __DIR__ . "/classes/User.php";

$user = new User();

var_dump( $user);


lesson_title($title = "Propriedades", __LINE__);


$user->firstName = "Augusto";
$user->lastName = "Monteiro";
$user->email = "jamonteirolima@gmail.com";

var_dump($user);



lesson_title($title = "Metodos", __LINE__);

$user1 = new User();
$user1->setFirstName("Marlon");
$user1->setLastName("Lima");
$user1->setEmail("marlon@gmail.com");


if(!$user1->getEmail()) {
    lesson_message("E-mail inválido");
    return;
}

var_dump($user1);

/*
echo "<p>" . COURSE . "</p>";
echo "<p></p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";

