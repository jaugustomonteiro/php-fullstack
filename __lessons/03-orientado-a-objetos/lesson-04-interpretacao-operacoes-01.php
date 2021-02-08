<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Orientado a objeto <br> Interpretação e operacoes - 01");

/**
 * 
 * CONSTRUCTS
 * [ __construct ] => Executado automaticamente por meio do operador new
 */
lesson_title($title = "__construct", __LINE__);

lesson_obs("[ __construct ] => Executado automaticamente por meio do operador new");

$userConstruct = new Source\Classes04\User(
    "Augusto",
    "Monteiro",
    "jamonteirolima@gmail.com"
);
var_dump($userConstruct);

/**
 * 
 * CLONE
 * [ __clone ] => Executado automaticamente quando um novo objeto é criado a partir do operador clone
 */
lesson_title("__clone", __LINE__);
lesson_obs("[ __clone ] => Executado automaticamente quando um novo objeto é criado a partir do operador clone");

$userClone = $userConstruct;
$userClone1 = $userClone;

$userClone1->setFirstName("Marlon");
$userClone1->setLastName("Lima");
$userClone->setFirstName("Marcio");

$userClone2 = clone $userClone;
$userClone2->setFirstName("Augusto");
$userClone2->setLastName("Monteiro");

$userClone3 = clone $userClone;
$userClone3->setFirstName("Marilene");
$userClone3->setLastName("Lima");


var_dump(
    $userConstruct,
);

var_dump(
    $userClone,
);
lesson_message("Não Clonou !" , "danger");

var_dump(
    $userClone1,
);
lesson_message("Não Clonou !", "danger");

var_dump(
    $userClone2,
);
lesson_message("Clonou !", "success");

var_dump(
    $userClone3
);
lesson_message("Clonou !", "success");



/**
 * 
 * DESTRUCT
 * lesson_obs("[ __destruct ] => Executado automaticamente quando o objeto e finalizado");

 */
lesson_title("__destruct", __LINE__);
lesson_obs("[ __destruct ] => Executado automaticamente quando o objeto e finalizado");

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";