<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Utilizando componentes");

lesson_title("Instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

$phpMailer = new PHPMailer();

var_dump($phpMailer instanceof PHPMailer);


lesson_title("Configure", __LINE__);

try {
    
    $mail = new PHPMailer(true);

    /* CONFIG */
    $mail->isSMTP();
    $mail->setLanguage("br");
    $mail->isHTML(true);
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->CharSet = "utf-8";

    /* AUTH */
    $mail->Host = "smtp.sendgrid.net";
    $mail->Username = "apikey";
    $mail->Password = "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";
    $mail->Port = "465";

    /* MAIL */
    $mail->setFrom("", "Brawziin Monteiro");
    $mail->Subject = "Este é meu envio via componente no JAML";
    $mail->msgHTML("<h1>Olá augusto</h1><p>Aqui é o Brawziin Monteiro</p>");

    /* SEND */
    $mail->addAddress("jamonteiriolima@gmail.com", "Augusto Monteiro");
    $send = $mail->send();

    var_dump($send);

} catch (PHPMailerException $exception) {
    echo message()->error($exception->getMessage());
}


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";