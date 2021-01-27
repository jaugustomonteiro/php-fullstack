<?php


require __DIR__ . "/shared/header.php";

heder_lesson("Manipulação e Tratamentos <br> Funcões para String");

lesson_title("Argumentos", __LINE__);

echo "<h1><a href='./lesson-10.php'>Clear</a></h1>";
echo "<p><a href='./lesson-10.php?name=augusto&email=jamonteirolima@gmail.com'>Dados</a></p>";

lesson_tag('Array');
$data = [
    "name" => "Augusto Monteiro",
    "email" => "jamonteirolima@gmail.com",
];

var_dump(http_build_query($data));

lesson_tag('Objetos');
$data2 = new StdClass();
$data2->name = "Augusto";
$data2->company = "jamonteirolima@gmail.com";
$data2->email = "jamonteirolima@gmail.com";

$arguments = http_build_query($data2);
var_dump($arguments);

lesson_tag('Argumentos by array');
echo "<p><a href='./lesson-10.php?{$arguments}'>Arguments</a></p>";

var_dump($_GET);


lesson_title("Segurança", __LINE__);


$dataFilter = http_build_query([
    "name"      => "Augusto Monteiro",
    "email"     => "jamonteirolima@gmail.com",
    "site"      => "localhost:8080",
    "script"    => "<script>Alert('Hello word')</script>",   
]);

var_dump($dataFilter);

lesson_tag('Argumentos by array');

echo "<p><a href='./lesson-10.php?{$dataFilter}'>Segurança</a></p>";

$dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED);

var_dump($dataUrl);

if($dataUrl) {
    if(in_array("", $dataUrl)) {
        lesson_message("Faltam dados", "danger");
    }
    elseif(empty($dataUrl['email'])) {
        lesson_message("Faltam o E-mail", "danger");
    }
    elseif(!filter_var($dataUrl['email'], FILTER_VALIDATE_EMAIL)) {
        lesson_message("Email inválido", "danger");
    }
    else {
        lesson_message("Tudo certo", "success");
    }
}
else {
    lesson_message("Url Inválida!", "danger");
}

$dataFilter = http_build_query([
    "name"      => "Augusto Monteiro",
    "email"     => "jamonteirolima@gmail.com",
    "site"      => "http://augusto.com",
    "script"    => "<script>Alert('Hello word')</script>",   
]);

var_dump($dataFilter);

parse_str($dataFilter, $arrDataFilter);



$dataPreFilter = [
    "name"      => FILTER_SANITIZE_STRING,
    "email"     => FILTER_VALIDATE_EMAIL,
    "site"      => FILTER_VALIDATE_URL,
    "script"    => FILTER_SANITIZE_STRING,   
];

lesson_tag("Array");
var_dump($arrDataFilter);

var_dump(filter_var_array($arrDataFilter, $dataPreFilter));





/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
lesson_message("Preencha todos os campos!", "warning");
*/
require __DIR__ .  "/shared/footer.php";