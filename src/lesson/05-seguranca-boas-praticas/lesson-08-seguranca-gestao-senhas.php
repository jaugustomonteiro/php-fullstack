<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

session();

heder_lesson("Segurança e Boas Práticas <br> Segurança e gestão de senhas");

lesson_title("Passowrd hashing", __LINE__);
lesson_obs("Uma API PHP para gerenciamento de senhas de modo seguro");

//$pass = password_hash("123456789", PASSWORD_DEFAULT, ["cost" => 12]);
$pass = password_hash("1234567890", PASSWORD_DEFAULT);

var_dump($pass);

var_dump([
    password_get_info($pass),
    password_needs_rehash($pass, PASSWORD_DEFAULT, ["cost" => 10]),
    password_verify("123456789", $pass)
]);


lesson_title("Password saving", __LINE__);
lesson_obs("Rotina de cadastro e atualização de senhas");

$user = user()->load(1);
$user->password = $pass;
$user->save();

var_dump(password_verify(1234567890, $user->password));

var_dump($user);


lesson_title("Password verify", __LINE__);
lesson_obs("Rotina de verificação de senha");

$login = user()->find("robson1@email.com.br");

var_dump($login);

if(!$login) {
    echo message()->info("E-mail informado não confere!");
}
elseif(!password_verify(1234567890, $login->password)) {
    echo message()->error("Password inválido");
}
else {
    $login->password = password_hash(1234567890, PASSWORD_DEFAULT);
    $login->save();
    session()->set("login", $login->data());
    echo message()->success("Ola {$login->first_name},  bem-vindo de volta");
}

var_dump($login, session()->all());

lesson_title("Password handle", __LINE__);
lesson_obs("Sintetizando uso de senha");

$pass = "12345678";

var_dump([
    $pass,
    $passwd = passwd($pass),
    passwd_verify($pass, $passwd),
    passwd_rehash($passwd)
]);
/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";



