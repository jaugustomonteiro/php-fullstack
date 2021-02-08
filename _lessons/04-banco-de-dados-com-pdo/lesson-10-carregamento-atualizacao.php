<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Carregamento e atualização");

use Source\PHPPDO\Models\UserModel;

lesson_title("save update", __LINE__);

$model = new UserModel();

$user = $model->load(4);

$user->email = "augusto@gmail.com";

if ($user != $model->load(4)) {
    $user->save();
    echo "<p class='trigger warning'>Atualizado!</p>";
} else {
    echo "<p class='trigger accept'>Já atualizado!</p>";
}


var_dump($user);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";