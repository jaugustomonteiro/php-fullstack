<?php

require __DIR__ . "/../_shared/header.php";

heder_lesson("PHP Orientado a Objetos <br> Carregamento automático");

lesson_title("Autoload spl psr-4", __LINE__);


//require __DIR__ . "/source/Loading/User.php";
//require __DIR__ . "/source/Loading/Address.php";
//require __DIR__ . "/source/Loading/Company.php";

require __DIR__ . "/source/autoload.php";

$user = new \Source\Loading\User();
$address = new \Source\Loading\Address();
$company = new \Source\Loading\Company();

var_dump(
    [
        $user,
        $address,
        $company
    ]
);


lesson_title("Autoload composer psr-4", __LINE__);

require __DIR__ . "/vendor/autoload.php";

echo __DIR__;

$mail = new \PHPMailer\PHPMailer\PHPMailer();

var_dump($mail);
/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ .  "/../_shared/footer.php";


require __DIR__ . "/source/vendor/autoload.php";