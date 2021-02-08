<?php

require __DIR__ . "/../_shared/header.php";

heder_lesson("Manipulação e Tratamentos <br> Funcões para String");

lesson_title($title = "string e multibytes", __LINE__);

$string = "O último show do Albert Ammons foi incrível";

var_dump([
    "string" => $string,
    "strlen" => strlen($string),
    "mb_strlen" => mb_strlen($string),
    "substr" => substr($string, "9"),
    "mb_substr" => mb_substr($string, "9"),
    "strtoupper" => strtoupper($string),
    "mb_strtoupper" => mb_strtoupper($string),
]);


lesson_title($title = "conversão de caixa", __LINE__);

$mbString = $string;

var_dump([
    "string" => $mbString,
    "mb_strtoupper" => mb_strtoupper($mbString),
    "mb_strtolower" => mb_strtolower($mbString),
    "mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER),
    "mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER),
    "mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE),
    "mb_convert_case UPPER SIMPLE" => mb_convert_case($mbString, MB_CASE_UPPER_SIMPLE),
]);

lesson_title($title = "substituição", __LINE__);

$mbReplace = $mbString . ". Fui, iria novamente, e foi épico";

var_dump([
   "mbReplace"  => $mbReplace,
   "mb_strlen"  => mb_strlen($mbReplace),
   "mb_strpos"  => mb_strpos($mbReplace, ', '),
   "mb_strrpos"  => mb_strrpos($mbReplace, ', '),
   "mb_substr"  => mb_substr($mbReplace, 50, 14),
   "mb_strstr"  => mb_strstr($mbReplace, ', ', true),
   "mb_strrchr"  => mb_strrchr($mbReplace, ', ', true),
]);


$mbStrReplace = $string;

echo "<p>" . $mbStrReplace . "</p>";
echo "<p>" . str_replace('show', '<b>SHOW</b>', $mbStrReplace) . "</p>";
echo "<p>" . str_replace(["show", "foi"], ['<b>SHOW</b>', '<b>FOI</b>'], $mbStrReplace) . "</p>";

$article = <<<BOOGIE
    <article>
    <h3>name</h3>
    <h2>email</h2>
    </article>
BOOGIE;

$article_data = [
    "name"  => "Augusto Monteiro",
    "email" => "jamonteirolima@gmail.com"
];

echo str_replace(array_keys($article_data), array_values($article_data), $article);

lesson_title($title = "parse string", __LINE__);

$endPoint = "name=Augusto&email=jamonteirolima@gmail.com";

mb_parse_str($endPoint, $parseEndPoint);

var_dump([
    "endPoint" => $endPoint,
    "mb_parse_str" => $parseEndPoint,
    "object" => (object) $parseEndPoint
]);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
lesson_tag('Augusto');
*/
require __DIR__ . "/../_shared/footer.php";