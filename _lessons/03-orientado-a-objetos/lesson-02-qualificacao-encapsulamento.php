<?php

require __DIR__ . "/../_shared/header.php";

heder_lesson("PHP Orientado a Objetos <br> Qualificação e encapsulamento");

lesson_title("namespaces", __LINE__);

require __DIR__ . "/classes/App/Template.php";
require __DIR__ . "/classes/Web/Template.php";

$app = new App\Template();
$web = new Web\Template();

var_dump(
    $app, 
    $web
);

use App\Template as AppTemplate;
use Web\Template as WebTemplate;

$appUseTemplate = new AppTemplate;
$appWebTemplate = new WebTemplate;

var_dump(
    $appUseTemplate,
    $appUseTemplate
);

lesson_title("visibilidade", __LINE__);

require __DIR__ . "/source/Qualifield/User.php";

use Source\Qualifield\User;

$user = new User();

// $user->firstName = "Augusto";
// $user->lastName = "Monteiro";

// $user->setFirstName("Augusto");
// $user->setLastName("Monteiro");
// $user->setEmail("jamonteirolilma@gmail.com");


lesson_obs("get_class_methods => Retorna os metodos public da class");

$user->setUser("Augusto", "Monteiro", "jamonteirolima@gmail.com");

var_dump(
    $user,
    get_class_methods($user)
);



echo "<p>O email de {$user->getFirstName()} é {$user->getEmail()}</p>";


lesson_title("manipulação", __LINE__);



$augusto = new User();

$retornoAugusto = $augusto->setUser(
    "Augusto",
    "monteiro",
    "jamonteirolimagmail.com"
);

if(!$retornoAugusto) {
    lesson_message($augusto->getError() . "Usuário: {$augusto->getFirstName()}", "danger");
}



$marlon = new User();
$retornoMarlon = $marlon->setUser(
    "Marlon",
    "Lima",
    "marlongmail.com"
);

if(!$retornoMarlon) {
    lesson_message($marlon->getError() . "Usuário: {$marlon->getFirstName()}", "danger");
}

$marcio = new User();
$retornoMarcio = $marcio->setUser(
    "Marcio",
    "Lima",
    "marciogmail.com"
);

if(!$retornoMarcio) {
    lesson_message($marcio->getError() . "Usuário: {$marcio->getFirstName()}", "danger");
}



var_dump([[$retornoAugusto, $augusto], [$retornoMarlon, $marlon], [$retornoMarcio, $marcio]]);




/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";