<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Removendo registro ativo");

use Source\PHPPDO\Models\UserModel;

lesson_title("destroy", __LINE__);

$model = new UserModel();

$user = $model->load(7);

if($user) {
    $user->destroy();
}

var_dump($user);

lesson_title("model destory", __LINE__);

$list = $model->all(100, 30);

if($list) {
    /** @var UserModel user */
    foreach ($list as $user) {
        var_dump($user);
        $user->destroy();
    }
}

var_dump($list);


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";