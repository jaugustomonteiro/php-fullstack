<?php

require __DIR__ . "/../_shared/header.php";

heder_lesson("Iniciando do Zero com PHP <br> Estrutura de repetição");

/*
lesson_obs("bolean");
*/

lesson_title($title = "while, do while", __LINE__);

lesson_obs("while");
$looping = 1;
$while = [];
$countLooping = 5;

while($looping <= $countLooping) {
    $while[] = $looping;
    $looping++;
}
var_dump($while);

lesson_obs("do while");
$looping = $countLooping;
$doWhile = [];

do {
    $doWhile[] = $looping;
    $looping--;
} while ($looping >= 1);

var_dump($doWhile);


lesson_title($title = "for", __LINE__);

$for = [];
for($i = 1; $i < $countLooping; $i ++) {
    $for[] = $i;
}
var_dump($for);


lesson_title($title = "break continue", __LINE__);

$break = [];
for($c = 1; $c < 15; $c ++) {
    if($c % 2 == 1) {
        continue;
    }

    if($c > 10) {
        break;
    }

    $break[] = $c;
}
var_dump($break);


lesson_title($title = "foreach", __LINE__);

$array = [];

lesson_obs("for");
for($ar = 0; $ar <= $countLooping; $ar++) {
    $array[] = $ar;
}
var_dump($array);


$foreachValue = [];

lesson_obs("foreach value");
foreach ($array as $value) {
    $foreachValue[] = $value;
}
var_dump($foreachValue);

lesson_obs("foreach key value");
$foreachKeyValue = [];
foreach ($array as $key => $value) {
    $foreachKeyValue[] = ("{$key} = {$value}");
}

var_dump($foreachKeyValue);

require __DIR__ . "/../_shared/footer.php";