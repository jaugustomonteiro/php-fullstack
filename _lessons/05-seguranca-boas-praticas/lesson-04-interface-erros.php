<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Segurança e Boas Práticas <br> Interface de Erros");

use Source\Core\Message;
use Source\Core\Session;
$session = new Session();

lesson_title("Message class", __LINE__);

$message = new Message();

var_dump(
    $message,
    get_class_methods($message)
);

lesson_title("Message Types", __LINE__);

$error = $message->success("Essa é uma mensagem de sucesso");

var_dump([
    $message->getText(),
    $message->getType(),
    $message->render()
]);

echo $message->info("Essa é uma messagem renderizada");
echo $message->success("Essa é uma messagem renderizada");
echo $message->warning("Essa é uma messagem renderizada");
echo $message->error("Essa é uma messagem renderizada");

lesson_title("Json Message", __LINE__);

echo $message->info($message->error("Essa é uma messagem renderizada")->json());


lesson_title("Flash Message", __LINE__);

//$message->success("Essa é uma mensagem flash!")->flash();

// if ($flash = $session->flash()) {
//     echo $flash;
//     var_dump([
//         $flash->getText(),
//         $flash->getType()
//     ]);
// }

var_dump(
    $_SESSION,
    $session->all()
);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";