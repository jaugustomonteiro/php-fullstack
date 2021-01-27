<?php


require __DIR__ . "/shared/header.php";

heder_lesson("Manipulação e Tratamentos <br> Formulários e filtros");

lesson_title("request", __LINE__);

$form = new StdClass();
//$form->method = "get";
$form->name = "";
$form->mail = "";

var_dump($_REQUEST);
require __DIR__ . "/form.php";



lesson_title("post", __LINE__);


var_dump($_POST);

$post = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump([
    $post,
    $postArray,
    (object)$postArray
]);

if($postArray) {
    if(in_array("", $postArray)) {
        lesson_message("Preencha todos os campos!", "warning");
    }   
    elseif(!filter_var($postArray['mail'], FILTER_VALIDATE_EMAIL)) {
        lesson_message("E-mail inválido", "warning");
    } 
    else {
        $saveStrip = array_map("strip_tags", $postArray);
        $save = array_map("trim", $saveStrip);
        var_dump($save);
        lesson_message("Cadastro realizado com sucesso", "success");
    }
}

$form->method = "post";
require __DIR__ . "/form.php";


lesson_title("get", __LINE__);


var_dump($_GET);


$get = filter_input(INPUT_GET, "mail", FILTER_VALIDATE_EMAIL);
$getArray = filter_input_array(INPUT_GET, FILTER_DEFAULT);

var_dump($get, $getArray);

$form->method = "post";
require __DIR__ . "/form.php";

lesson_title("filter", __LINE__);

$form->method = "get";
require __DIR__ . "/form.php";

var_dump(
    filter_list(),
    [
        filter_id("validate_email"),
        FILTER_VALIDATE_EMAIL,
        FILTER_SANITIZE_EMAIL,
        filter_id("email"),
        filter_id("string"),
        FILTER_SANITIZE_STRING,
    ]
);

$filter_form = [
    "name" => FILTER_SANITIZE_STRIPPED,
    "mail" => FILTER_VALIDATE_EMAIL,
];

$getForm = filter_input_array(INPUT_GET, $filter_form);

var_dump($getForm);

$mail = "jamonteirolima@gmail.com";

var_dump([
    filter_var($mail, FILTER_VALIDATE_EMAIL),
    filter_var_array($getForm, $filter_form),
]);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ .  "/shared/footer.php";