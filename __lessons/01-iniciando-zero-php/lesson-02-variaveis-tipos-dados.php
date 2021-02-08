<?php

require __DIR__ . "/../_shared/header.php";

heder_lesson("Iniciando do Zero com PHP <br> Variáveis e tipo de dados");

lesson_title($title = "Tipo Variáveis", __LINE__);

$userFirstName = "Augusto";
$userLastName = "Monteiro";
echo "<h3>{$userFirstName} {$userLastName}</h3>";

$user_first_name = $userFirstName;
$user_last_name = $userLastName;
echo "<h3>{$user_first_name} {$user_last_name}</h3>";

$userAge = 32;
echo "<h3>{$user_first_name} {$user_last_name} tem <span class='tag'>{$userAge}</span> anos</h3>";

$userEmail = "<p>jamonteirolima@gmail.com</p>";
echo $userEmail;


lesson_obs("variável variável");

$company = "JAML";
$$company = "Treinamentos";
echo "<h3>{$company} {$JAML}</h3>";

lesson_obs("Referenciar");

$calcA = 10;
$calcB = 20;

//$calcB = $calcA;
$calcB = &$calcA;
$calcB = 20;


var_dump([
    "a" => $calcA,
    "b" => $calcB
]);

lesson_title($title = "Tipos boleano", __LINE__);
$true = true;
$false = false;

var_dump([
    $true,
    $false
]);

$userAge = 45;

$bestAge = ($userAge > 46);

var_dump($bestAge);

lesson_obs("valores nulos");

$a = 0;
$b = 0.0;
$c = "";
$d = [];
$e = null;

var_dump([$a, $b, $c, $d, $e]);

if($a || $b || $c || $d || $e) {
    var_dump(true);
} else {
    var_dump(false);
}

lesson_title($title = "Tipo callback", __LINE__);
$code = "<article><h1>Um call user function</h1></article>";

lesson_obs('call_user_func(strip_tags, string_html) - Remove tags html');

$codeClear = call_user_func("strip_tags", $code);
var_dump($code, $codeClear);

lesson_obs("Funções Anonimas");

$codeMore = function($code) {
    var_dump($code);
};

$codeMore('#Boracodar!');



lesson_title($title = "Outros tipos", __LINE__);

lesson_obs("String");
$string = "Ola mundo";
var_dump($string);

lesson_obs("Array");
$array1 = array('info1', 'info2');
$array2 = ['info1', 'info2'];
var_dump([$array1, $array2]);

lesson_obs("Object");
$object = new stdClass;
$object->name = "Augusto";
$object->sobreNome = "Monteiro";
var_dump($object);

lesson_obs("Null");
$null = null;
var_dump($null);

lesson_obs("Int");
$int = 20;
var_dump($int);


lesson_obs("Float");
$float = 21.55555;
var_dump($float);


lesson_obs("bolean");
$bolean_true = true;
$bolean_false = false;
var_dump($bolean_true, $bolean_false);



require __DIR__ . "/../_shared/footer.php";