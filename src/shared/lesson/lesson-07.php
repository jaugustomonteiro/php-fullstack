<?php

require "../../shared/header.php";

heder_lesson("Closures e Generators");

/*
lesson_obs("bolean");
*/

lesson_title($title = "Tipo Variáveis", __LINE__);

lesson_obs("Função anônima");

$myAge = function($year) {
    $age = date('Y') - $year;
    return "<p>Você tem {$age} anos</p>";
};

$priceBrl = function($price) {
    return "R$ " . number_format($price, 2, ",", ".");
};


echo $myAge(1977);
echo "<h1>O projeto custa {$priceBrl(150)}</h1>";


$myCart = [];

$myCart['totalPrice'] = 0;

$cartAdd = function ($item, $qtd, $price) use (&$myCart) {
    $myCart[$item] = $qtd * $price;
    $myCart['totalPrice'] += $myCart[$item];
};

$cartAdd('html5', 2, 1500);
$cartAdd('javascript', 1, 500);
$cartAdd('bootstrap', 1, 200);

var_dump($myCart, $cartAdd);


lesson_obs("Generators, a função não passsa pela memoria e sim pelo processamento");

$iterator = 30;

function showDate($days) {
    $saveDate = [];
    for($day = 1; $day < $days; $day ++) {
        $saveDate[] = date('d/m/Y', strtotime("+1{$day}days")); 
    }
    return $saveDate;
}


echo "<div style='algin: center'>";
foreach (showDate(10) as $date) {
    lesson_tag($date);
}
echo "<div>";

function generatorDate($days) {
    for($day = 1; $day < $days; $day ++) {
        yield date('d/m/Y', strtotime("+1{$day}days")); 
    }
}

lesson_obs('Generator troque retorno por yield. os dados não alocados na memoria, são processado e apresentando com o tempo');

echo "<div style='display: flex-wrap; justify-content:center'>";
foreach (generatorDate($iterator) as $date) {
    lesson_tag($date);
}
echo "<div>";


require "../../shared/footer.php";