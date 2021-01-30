<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

use Source\Classes07\Members\Config;

heder_lesson("Orientado a objeto <br> Membros de uma Classe");

lesson_title("Constantes", __LINE__);

$config = new Config();

var_dump(
    $config::COMPANY,
    //$config::DOMAIN,
    //$config::SECTOR,
);




lesson_title("Propriedades", __LINE__);
lesson_title("Metodos", __LINE__);
lesson_title("Exemplos", __LINE__);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";