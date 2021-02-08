<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

use Source\Classes06\Address;
use Source\Classes06\Inheritance\Event;
use Source\Classes06\Inheritance\EventLive;
use Source\Classes06\Inheritance\EventOnline;

heder_lesson("Orientado a objeto <br> Herança e poliformismo");

/**
 * [ Classe pai ] - Uma classe que define o modelo base da estrutura da herança
 */
lesson_title("Classe pai", __LINE__);
lesson_obs("[ Classe pai ] - Uma classe que define o modelo base da estrutura da herança");

$event = new Event(
    "Workshop HTML",
    new DateTime("2021-01-30 8:00"),
    500,
    3
);

var_dump($event);

$event->register("Marcio Lima", "marcio@gmail.com");
$event->register("Marlon Lima", "marlon@gmail.com");
$event->register("Flavia Lima", "flavia@gmail.com");
$event->register("Agnaldo Costa", "agnaldo@gmail.com");


/**
 * [ classe filha ] Uma classe que herda a classe pai e especializa suas filhas
 */
lesson_title("Classe filha", __LINE__);
lesson_obs("[ classe filha ] Uma classe que herda a classe pai e especializa suas filhas");

$address = new Address("Rua qno 18 conjunto 24", 07, "Casa");

$event = new EventLive(
    "Workshop HTML",
    new DateTime("2021-01-30 8:00"),
    500,
    4,
    $address
);
var_dump($event);

$event->register("Marilene Lima", "marilene@gmail.com");
$event->register("Marcio Lima", "marcio@gmail.com");
$event->register("Marlon Lima", "marlon@gmail.com");
$event->register("Flavia Lima", "flavia@gmail.com");
$event->register("Agnaldo Costa", "agnaldo@gmail.com");


/**
 * [ Poliformismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) da classe pai, mas altera o comportamento desses metodos para especializar
 */
lesson_title("Poliformismo", __LINE__);
lesson_obs("[ Poliformismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) da classe pai, mas altera o comportamento desses metodos para especializar");

$event = new EventOnline(
    "Workshop HTML",
    new DateTime("2021-01-30 8:00"),
    150,
    "http://matraca.com.br",

);

var_dump($event);

$event->register("Marilene Lima", "marilene@gmail.com");
$event->register("Marcio Lima", "marcio@gmail.com");
$event->register("Marlon Lima", "marlon@gmail.com");
$event->register("Flavia Lima", "flavia@gmail.com");
$event->register("Agnaldo Costa", "agnaldo@gmail.com");


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";