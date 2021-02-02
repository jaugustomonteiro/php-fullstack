<?php


require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Refatorando modelo de usuário");

use Source\Models\User;


lesson_title("find", __LINE__);

$model = new User();
$user = $model->find("id = :id", "id=1");
var_dump($user);


lesson_title("Find by Id", __LINE__);

$user = $model->findById(2);
var_dump($user);

lesson_title("Find by E-email", __LINE__);

$user = $model->findByEmail("joão32@email.com.br");
var_dump($user);


lesson_title("all", __LINE__);

$users = $model->all(3);

var_dump($users);

lesson_title("Save create", __LINE__);

$user = $model->bootstrap(
    "Augusto",
    "Monteiro",
    "jamonteirolilma@gmail.com",
    "1112223334444"
);

if($user->save()) {
    echo message()->success("Cadastro realizado com sucesso!");
}
else {
    echo $user->message();
    echo message()->info($user->message()->json());
}


lesson_title("Save update", __LINE__);

$user = user()->findById(51);

$user->last_name = "Monteiro Lima";
$user->password = passwd("0564178987441");

if($user->save()) {
    echo message()->success("Dados atualizado com sucesso!");
}
else {
    echo $user->message();
    echo message()->info($user->message()->json());
}


var_dump($user);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";