<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Acesso e controle de sessão");

use Source\Core\Session;
use Source\Models\User;

lesson_title("Session", __LINE__);

$session = new Session();

$session->set("user", 1);

$session->regenerate();

$session->set("status", 255);

$user = [
    "firstName" => "Augusto",
    "lastName"  => "Monteiro",
    "email"     => "jamonteirolima@gmail.com"
];

$session->set("fullUser", $user);

$session->unset("user");

if(!$session->has("login")) {
    lesson_message("Logar");
    $user = (new User())->load(1);
    $session->set("login", $user->data());
}

$session->destroy();

var_dump(
    $_SESSION,
    $session->all(),
    session_id(),    
);






/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";