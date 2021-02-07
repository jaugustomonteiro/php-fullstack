<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Uma camada de visualização");

use League\Plates\Engine;
use Source\Core\View;

session();

lesson_title("plates", __LINE__);

var_dump($_SESSION);

$plates = Engine::create(__DIR__ . "/assets/views", "php");
var_dump(get_class_methods($plates));



// $plates->addFolder("test", "test");

// if(empty($_GET["id"])) {
//     echo $plates->render("test::list", [
//         "title" => "Usuário do sistema",
//         "list"  => (new \Source\Models\User())->all(5),
//     ]);
// }
// else {
//     echo $plates->render("test::user", [
//         "title" => "Editar Usuários",
//         "user"  => (new \Source\Models\User())->findById($_GET["id"])
//     ]);
// }

lesson_title("synthesize", __LINE__);

$view = new View();
$view->path("test", "test");

if(empty($_GET["id"])) {
    echo $view->render("test::list", [
        "title" => "Usuário do sistema",
        "list"  => (new \Source\Models\User())->all(5),
    ]);
}
else {
    echo $view->render("test::user", [
        "title" => "Editar Usuários",
        "user"  => (new \Source\Models\User())->findById($_GET["id"])
    ]);
}


/****************************************************************
 *  echo "<p>" . COURSE . "</p>";                               *
 *  lesson_title($title = "include include_ondce", __LINE__);   *
 *  heder_lesson("Requisição de arquivos");                     *
 *  lesson_obs("bolean");                                       *
 ****************************************************************/
require __DIR__ . "/../_shared/footer.php";