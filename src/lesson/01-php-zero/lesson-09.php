<?php

require "../../shared/header.php";

heder_lesson("Trabalhando com funções");

require __DIR__ . "/functions.php";

lesson_title($title = "functions", __LINE__);

var_dump(functionName("agumento1", "agumento2", "agumento3"));
var_dump(functionName("agumento4", "agumento5", "agumento6"));

var_dump(optionsArgs("Augusto"));
var_dump(optionsArgs("Augusto", "Marcio"));
var_dump(optionsArgs("Augusto", "Marcio", "Marlon"));


lesson_title($title = "global access", __LINE__);

lesson_obs('Ignora o escopo protegido de uma função');
$weight = 84;
$height = 1.79;

echo "<p>" . calcImc() . "</p>"; 

lesson_title($title = "static arguments", __LINE__);

$pay = payTotal(50);
$pay = payTotal(70);
$pay = payTotal(30);
$pay = payTotal(150);

echo "<p>{$pay}</p>";



lesson_title($title = "dinamic arguments", __LINE__);

var_dump(myTeam("Augusto", "Marcio", "Marlon"));

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require "../../shared/footer.php";