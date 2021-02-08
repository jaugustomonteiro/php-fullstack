<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Desmistificando rotas");

use Source\Core\Route;

lesson_title("Routes", __LINE__);

Route::get("/", "UserController:home");
Route::get("/editar", "UserController:edit");

Route::get("/rotas", function () {
    var_dump(Route::routes());
});


/****************************************************************
 *  echo "<p>" . COURSE . "</p>";                               *
 *  lesson_title($title = "include include_ondce", __LINE__);   *
 *  heder_lesson("Requisição de arquivos");                     *
 *  lesson_obs("bolean");                                       *
 ****************************************************************/
require __DIR__ . "/../_shared/footer.php";