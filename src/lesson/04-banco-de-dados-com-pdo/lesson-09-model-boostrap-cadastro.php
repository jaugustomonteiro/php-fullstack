<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Model bootstrap e cadastro");

use Source\PHPPDO\Models\UserModel;

lesson_title("Bootstrap", __LINE__);

$model = new UserModel;

$user = $model->bootstrap(
    "Brawzinn1",
    "Monteiro",
    "brawziin12@gmail.com",
    34892493349
);

var_dump($user);


lesson_title("Save create", __LINE__);


if (!$model->find($user->email)) {
    lesson_message("Cadastro");
    $user->save();
}
else {
    lesson_message("Read", "success");
    $user = $model->find($user->email);
}
var_dump($user);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";