<?php

require __DIR__ . "/../_shared/header.php";

heder_lesson("Iniciando do Zero com PHP <br> Requisição de arquivos");

lesson_title("include include_ondce", __LINE__);

// include "file.php";
// echo "<p>Continue</p>";
lesson_obs("Uma boa prática, usar __DIR__ sempre que for incluir um arquivo");
include __DIR__ . "/test.php";

$profiles = [];

$profile = new stdClass();
$profile->name = "Augusto Monteiro";
$profile->company = "JAML";
$profile->email = "jamonteirolima@gmail.com";
$profiles[] = $profile;
include __DIR__ . "/profile.php";

$profile = new stdClass();
$profile->name = "Márcio Lima";
$profile->company = "JAML";
$profile->email = "jamonteirolima@gmail.com";
$profiles[] = $profile;
include __DIR__ . "/profile.php";

echo "<hr />";
foreach ($profiles as $data) {
    include __DIR__ . "/array-profile.php";
}

lesson_obs('Obs: include_once, somente irá incluir o arquivo ainda não tenha sido incluso');

var_dump($profile);

lesson_title("require require_once", __LINE__);

lesson_obs('Usado para importar arquivos importantes. funções necessárias');
lesson_obs('Obs: require_once, somente irá incluir o arquivo ainda não tenha sido incluso');

// require "file.php";
// echo "<p>Continue</p>";

require __DIR__ . "/config.php";

echo "<p>" . COURSE . "</p>";

require_once __DIR__ . "/config.php";
/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";