<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Uma camada de controle");

use Source\App\Controllers\UserController;

lesson_title("Controller", __LINE__);

$controller = new UserController();

if(empty($_GET["id"])) {
    $controller->home();
}
else {
    $controller->edit();
}

/****************************************************************
 *  echo "<p>" . COURSE . "</p>";                               *
 *  lesson_title($title = "include include_ondce", __LINE__);   *
 *  heder_lesson("Requisição de arquivos");                     *
 *  lesson_obs("bolean");                                       *
 ****************************************************************/
require __DIR__ . "/../_shared/footer.php";