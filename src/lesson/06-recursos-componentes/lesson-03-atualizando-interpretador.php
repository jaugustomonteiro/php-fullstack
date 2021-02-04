<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Atualizando o interpretador");

lesson_title("Get Composer", __LINE__);

var_dump(get_defined_constants(true)['user']);



/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";