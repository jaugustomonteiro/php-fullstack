<?php

use Source\Classes04\Product;

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Orientado a objeto <br> Interpretação e operacoes - 02");

/**
 * 
 * [ __set ] => Executado automáticamente quando se tenta criar uma propriedade inacessível
 */
lesson_title($title = "__set", __LINE__);
lesson_obs("[ __set ] => Executado automáticamente quando se tenta criar uma propriedade inacessível(private) ou não existe");

$html = new Product();
$html->handler("Html 5", 99);

$html->name = "HTML5";
$html->title = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, pariatur.";
$html->value = 88;
// $html->price = 87;

var_dump($html);


/**
 * 
 * [ __get ] => Executado automaticamente quando se tentar obter propriedade inacessível
 */
lesson_title($title = "__get", __LINE__);
lesson_obs("[ __get ] => Executado automaticamente quando se tentar obter propriedade inacessível");

$html->title = "HTML 5 Master";
$html->company = "JAMLWebSites";

lesson_message("O curos {$html->title} da {$html->company} é o melhor curso de PHP do mercado");

/**
 * 
 * [ __isset ] => Executado automaticamente quando um tste ISSET ou EMPYT é executado em uma propriedade
 */
lesson_title($title = "__isset", __LINE__);
lesson_obs("[ __isset ] => Executado automaticamente quando um tste ISSET ou EMPYT é executado em uma propriedade");

isset($html->phone);
isset($html->name);
empty($html->address);

var_dump($html);

/**
 * 
 * [ __call ] => Executado automaticamente quando se tentar usar um método inacessível
 */
lesson_title($title = "__call", __LINE__);
lesson_obs("[ __call ] => Executado automaticamente quando se tentar usar um método inacessível");

$html->notFound("Fracassou", "teste");
$html->setPrice(95, 3);

/**
 * 
 * [ __toString ] => Executado automaticamente quando se tentar dar um echo em um objeto da classe
 */
lesson_title($title = "__toString", __LINE__);
lesson_obs("[ __toString ] => Executado automaticamente quando se tentar dar um echo em um objeto da classe");


echo $html;
/**
 * 
 * [ __unset ] => Executado automaticamente quando se tenta usar UNSET em uma propriedade inacessível
 */
lesson_title($title = "__unset", __LINE__);
lesson_obs("[ __unset ] => Executado automaticamente quando se tenta usar UNSET em uma propriedade inacessível");

unset(
    $html->name,
    $html->price,
    $html->data,
    $html->title
);

var_dump($html);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";