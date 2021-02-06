<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Utilizando componentes");

lesson_title("Instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

$phpMailer = new PHPMailer();

var_dump($phpMailer instanceof PHPMailer);


lesson_title("Configure", __LINE__);

try {
    
    $mail = new PHPMailer(true);

    /* CONFIG */
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
    $mail->isSMTP();
    $mail->setLanguage("en");
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
    $mail->setFrom('jamonteirolima@gmail.com', 'Augusto Monteiro');
    $mail->Subject = "Este é meu envio via componente no JAML";
    $mail->msgHTML("<h1>Olá Matraca</h1><p>Aqui é o Augusto Monteiro</p>");

    /* SEND */
    $mail->addAddress("matraca.suporte@gmail.com", "Matraca");
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