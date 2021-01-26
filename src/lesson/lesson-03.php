<?php

require __DIR__ . "/shared/header.php";

heder_lesson("Manipulação e Tratamentos <br> Manipulação de objetos");

lesson_title($title = "Manipulação", __LINE__);

$arrayProfie = [
    "name"  => "Augusto Monteiro",
    "email" => "jamonteirolima@gmail.com"
];

$objectProfile = (object)$arrayProfie; 

var_dump([
    $arrayProfie,
    $objectProfile
]);

lesson_tag("Acessando o array");
echo "<p>" . $arrayProfie['name'] . "</p>";

lesson_tag("Acessando o objeto");
echo "<p>" . $objectProfile->name . "</p>";


lesson_obs("unset => remove atributo do objeto");
$ceo = $objectProfile;

unset($ceo->email);
var_dump($ceo);

lesson_obs("Criando objeto com StdClass");

$user = new StdClass();

$user->name = "Augusto Monteiro";
$user->email = "jamonteirolima@gmail.com";
$user->perfil = "Administrador";
$user->password = "000111333#sdfaf#sdFADSASDF";

var_dump($user);


lesson_title($title = "Análise", __LINE__);

$date = new DateTime();

var_dump([
    "class"     => get_class($date),
    "methods"   => get_class_methods($date),
    "vars"      => get_object_vars($date),
    "parent"    => get_parent_class($date),
    "subclass"  => is_subclass_of($date, "DateTime")
]);

$exeption = new PDOException();

var_dump([
    "class"     => get_class($exeption),
    "methods"   => get_class_methods($exeption),
    "vars"      => get_object_vars($exeption),
    "parent"    => get_parent_class($exeption),
    "subclass"  => is_subclass_of($exeption, "Exception")
]);


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ .  "/shared/footer.php";