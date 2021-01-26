<?php

require "../../shared/header.php";

heder_lesson("Operadores na prática");

/*
lesson_obs("bolean");
*/

lesson_title($title = "Operadores de atribuição", __LINE__);

$operatorA = 5;

$operators = [
    "a += 5" => $operatorA += 5,
    "a -= 5" => $operatorA -= 2,
    "a *= 5" => $operatorA *= 5,
    "a /= 5" => $operatorA /= 5,
    "a %  5" => $operatorA %= 5,
];

var_dump($operators);

lesson_obs("Incremento e decremento");

$incrementA = 5;
$incrementB = 5;

$increment = [
    "pos_incremento" => $incrementA++,
    "res_incremento" => $incrementA,
    "pre-incremento" => ++$incrementA,

    "pos_decremento" => $incrementB--,
    "res_decremento" => $incrementB,
    "pre-decremento" => --$incrementB,
];

var_dump($increment);


lesson_title($title = "Operadores de comparação", __LINE__);

$relatedA = 5;
$relatedB = "5";
$relatedC = 10;

$related = [
    "a ==  b" => ($relatedA == $relatedB),
    "a === b" => ($relatedA === $relatedB),
    "a !=  b" => ($relatedA != $relatedB),
    "a !== b" => ($relatedA !== $relatedB),
    "a >   c" => ($relatedA > $relatedC),
    "a >=  b" => ($relatedA >= $relatedB),
    "a >=  c" => ($relatedA >= $relatedC),
    "a <=  c" => ($relatedA <= $relatedC),
];

lesson_obs("=== testa tipo e valor");
lesson_obs("!== testa se valores e tipos são diferentes");

var_dump($related);


lesson_title($title = "Operadores lógicos", __LINE__);

$logicA = true;
$logicB = false;

var_dump([
    "a     " => $logicA,
    "b     " => $logicB,
    "a && b" => ($logicA && $logicB),
    "a || b" => ($logicA || $logicB),
    "a     " => ($logicA),
    "!a    " => (!$logicA),
    "b     " => ($logicB),
    "!b    " => (!$logicB),
]);

lesson_title($title = "Operadores aritiméticos", __LINE__);

$calcA = 5;
$calcB = 10;

var_dump([
    "a    " => $calcA,
    "b    " => $calcB,
    "a + b" => $calcA + $calcB,
    "a - b" => $calcA - $calcB,
    "a * b" => $calcA * $calcB,
    "a / b" => $calcA / $calcB,
    "a % b" => $calcA % $calcB,
]);



require "../../shared/footer.php";