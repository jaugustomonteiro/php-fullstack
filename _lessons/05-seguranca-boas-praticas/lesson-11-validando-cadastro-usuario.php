<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Validando cadastro de usuário");

use Source\Models\User;

lesson_title("Registrar", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

if($post) {
    $data = (object)$post;

    if(!csrf_verify($post)) {
        $error = message()->error("Erro ao enviar, favor tente novamente");
    }
    else {
        $user = new User();
        $user->bootstrap(
            $data->first_name,
            $data->last_name,
            $data->email,
            $data->password,
        );

        if(!$user->save()) {
            echo $user->message();
        }
        else {
            echo message()->success("Cadastro realizado com sucesso!");
            //unset($data);
        }

        var_dump($user->data);
    }

    var_dump($data);
}


require __DIR__ . "/form-lesson-12.php";

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";