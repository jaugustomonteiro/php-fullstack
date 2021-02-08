<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Sintetizando e abstraindo");

lesson_title("synthesize", __LINE__);

use Source\Core\Email;

$email = (new Email)->boostrap(
    "Olá mundo",
    "<h1>Mensagem do Olá mundo</h1>",
    "matraca.suporte@gmail.com",
    "Matraca",
);

$email->attach(__DIR__ . "/../_shared/img/php-vscode-logo.png", "vscode");
$email->attach(__DIR__ . "/../_shared/img/images.png", "image");

if($email->send()) {
    echo message()->success("E-mail enviado com sucesso");
}
else {
    echo $email->message();
}



/****************************************************************
 *  echo "<p>" . COURSE . "</p>";                               *
 *  lesson_title($title = "include include_ondce", __LINE__);   *
 *  heder_lesson("Requisição de arquivos");                     *
 *  lesson_obs("bolean");                                       *
 ****************************************************************/
require __DIR__ . "/../_shared/footer.php";