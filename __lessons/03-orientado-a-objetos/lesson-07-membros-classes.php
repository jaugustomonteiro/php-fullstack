<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

use Source\Classes07\Members\Config;
use Source\Classes07\Members\Message;

heder_lesson("Orientado a objeto <br> Membros de uma Classe");

/**
 * CONSTANTES
 */
lesson_title("Constantes", __LINE__);

$config = new Config();

var_dump(
    $config::COMPANY,
    //$config::DOMAIN,
    //$config::SECTOR,
);


$reflection = new ReflectionClass(Config::class);

var_dump($config, $reflection->getConstants());

/**
 * PROPRIEDADES
 */
lesson_title("Propriedades", __LINE__);

Config::$company = "JAML";
Config::$domain = "augusto.com";
Config::$sector = "Educação";

$config::$sector = "Tecnologia";

var_dump($config, $reflection->getProperties(), $reflection->getDefaultProperties());


/**
 * METODOS
 */
lesson_title("Metodos", __LINE__);

$config::setConfig("JAML", "augusto.com", "Suporte");

var_dump(
    $config,
    $reflection->getMethods(),
    $reflection->getDefaultProperties()
);


/**
 * EXEMPLOS
 */
lesson_title("Exemplos", __LINE__);

$message = new Message();

$message::show("Uma messagem");

var_dump($message);

lesson_tag("Show");
Message::show("Essa é uma messagem, apenas testando!", Message::DANGER);
Message::show("Essa é uma messagem, apenas testando!", Message::WARNING);
Message::show("Essa é uma messagem, apenas testando!", Message::SUCCESS);

lesson_tag("Return");
echo Message::push("Essa é uma messagem, apenas testando!", Message::SUCCESS);
echo Message::push("Essa é uma messagem, apenas testando!", Message::WARNING);
echo Message::push("Essa é uma messagem, apenas testando!", Message::DANGER);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";