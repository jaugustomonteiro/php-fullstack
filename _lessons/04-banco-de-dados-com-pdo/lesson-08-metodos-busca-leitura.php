<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Métodos de busca e leitura");

use Source\Classes08\Models\UserModel;

lesson_title("load", __LINE__);

$model = new UserModel();

$user = $model->load(1);

var_dump(
    $user,
    "{$user->first_name} {$user->last_name}"
    
);

lesson_title("find", __LINE__);

$user = $model->find("jamonteirolima@gmail.com");

var_dump(
    $user,
    "{$user->first_name} {$user->last_name}"
    
);

lesson_title("all", __LINE__);

$all = $model->all(5);

//var_dump($all);

/** @var User $user */
foreach ($all as $user) {
    var_dump("{$user->first_name} {$user->last_name}");
}

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";