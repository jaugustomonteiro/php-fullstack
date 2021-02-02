<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Camada de manipulação 3");

use Source\Core\Message;

lesson_title("Validate", __LINE__);

$message = new Message();

$email = "jamonteiro@gmail.com";

if(!is_email($email)) {
    echo $message->error("O E-mail " . $email .  " é inválido");
}
else {
    echo $message->success("O E-mail " . $email .  " é válido");
}

$password = "1234567890";

if(!is_passwd($password)) {
    echo $message->error("O Passowrd " . $password .  " é inválido");
}
else {
    echo $message->success("O Passowrd " . $password .  " é válido");
}



lesson_title("Navigation", __LINE__);

var_dump([
    url("/blog/titulo-do-artigo"),
    url("blog/titulo-do-artigo"),
]);


if (empty($_GET)) {
    //redirect("?f=true");
}

lesson_title("Triggers", __LINE__);

var_dump(user()->load(1));

echo message()->success("Hello World!!!");
echo message()->info("Hello World!!!");
echo message()->warning("Hello World!!!");
echo message()->error("Hello World!!!");

session()->set("user", user()->load(2));

var_dump(session()->all());

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";