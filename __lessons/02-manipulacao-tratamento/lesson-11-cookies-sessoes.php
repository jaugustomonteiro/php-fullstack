<?php

// session_start();

require __DIR__ . "/../_shared/footer.php";

heder_lesson("Manipulação e Tratamentos <br> Cookies e sessoes");

lesson_title($title = "Cookies", __LINE__);

var_dump($_COOKIE);

// lesson_obs("Criação de Cookie => " . 'setcookie("jaml", 056417, time() + 10);');

// setcookie("jaml", 056417, time() + 360);

// lesson_obs("remoção do cookie => " . 'setcookie("jaml", 056417, time() - 60);');

setcookie("jaml", 056417, time() - 60);

// $cookie = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRIPPED);
// var_dump([
//     $_COOKIE,
//     $cookie
// ]);

$time = time() + (60 * 60 * 24);
$user = [
    "user" => "root",
    "password" => "root",
    "expire" => $time,
];

setcookie(
    "fslogin",
    http_build_query($user),
    $time,
    "/",
    "17.0.0.2",
    false

);


$login = filter_input(INPUT_COOKIE, "fslogin", FILTER_SANITIZE_STRIPPED);


//var_dump($_COOKIE);

if($login) {
    var_dump($login);
    parse_str($login, $arrUser);
}


var_dump($arrUser, (object)$arrUser);

lesson_title($title = "Sessões", __LINE__);

session_save_path(__DIR__ . "/ses");
session_name("JAML_SESSIONID");
session_start([
    "cookie_lifetime" => (60*60*24)
]);



var_dump(
    $_SESSION,
    [
                "id"        => session_id(),  
                "name"      => session_name(),  
                "status"    => session_status(),
                "save_pah"  => session_save_path(),
                "cookie"    => session_get_cookie_params()
           ]
);


// $_SESSION['login'] = (object)$user;
// $_SESSION['user'] = $user;

lesson_obs('unset => Elimina uma sessão específica => unset($_SESSION["user"]');
//unset($_SESSION['user']);

lesson_obs("session_destroy() => Elimina todas as sessões");
session_destroy();

var_dump($_SESSION);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
lesson_message("Preencha todos os campos!", "warning");
*/
require __DIR__ . "/../_shared/footer.php";