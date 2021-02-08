<?php

require __DIR__ . "/../_shared/header.php";

heder_lesson("Iniciando do Zero com PHP <br> Arrays, vetores e pilhas");

/*
lesson_obs("bolean");
*/

lesson_title($title = "Index Array", __LINE__);

$arrA = array(1,2,3, "4");
$arrA1 = [0, 1, 2, 3];
var_dump(
    [
        $arrA,
        $arrA1,
    ]
);

$arrayIndex = [
    "Augusto",
    "Marcio",
    "Marlon",
    "Flavia",
    "Marilene"
];

var_dump($arrayIndex);

lesson_obs("Atribuir valor ao array");

$arrayIndex[] = "Jose";
$arrayIndex[] = "Marlene";

var_dump($arrayIndex);

lesson_title($title = "Associative Array", __LINE__);

$arrayAssoc = [
    "pai"       => "Jose",
    "mae"       => "Marlene",
    "filho1"    => "Marilene",
    "filho2"    => "Augusto",
    "filho3"    => "Flavia",
    "filho4"    => "Marlon",
    "filho5"    => "Marcio",
];

$arrayAssoc["cunhado1"] = "Maupimo";
$arrayAssoc["cunhado2"] = "Francisco";
$arrayAssoc["cunhado3"] = "Jamile";
$arrayAssoc["sobrinho1"] = "Junior";
$arrayAssoc["sobrinho2"] = "Mikael";


var_dump($arrayAssoc);




lesson_title($title = "Multidimensional Array", __LINE__);

$arrayMult = [
    "pais" => [
        "pai"       => "Jose",
        "mae"       => "Marlene",
    ],
    "filhos" => [
        "filho1"    => "Marilene",
        "filho2"    => "Augusto",
        "filho3"    => "Flavia",
        "filho4"    => "Marlon",
        "filho5"    => "Marcio",
    ],
    "cunhados" => [
        "cunhado1" => "Maupimo",
        "cunhado2" => "Francisco",
    ],
    "sobrinhos" => [
        "sobrinho1" => "Junior",
        "sobrinho2" => "Mikael",
    ]
];

var_dump($arrayMult);

lesson_title($title = "Array access", __LINE__);


$arrayAcess = [
    "pais" => [
        "pai"       => "Jose",
        "mae"       => "Marlene",
    ],
    "filhos" => [
        "filho1"    => "Marilene",
        "filho2"    => "Augusto",
        "filho3"    => "Flavia",
        "filho4"    => "Marlon",
        "filho5"    => "Marcio",
    ],
    "cunhados" => [
        "cunhado1" => "Maupimo",
        "cunhado2" => "Francisco",
        "cunhado3" => "Jamile",
    ],
    "sobrinhos" => [
        "sobrinho1" => "Junior",
        "sobrinho2" => "Mikael",
    ]
];

lesson_obs("Pais");
var_dump($arrayAcess['pais']);

lesson_obs("Mae");
var_dump( $arrayAcess['pais']['mae']);

lesson_obs("Filho 2");
var_dump($arrayAcess['filhos']['filho2']);

lesson_obs("Cunhado 3");
var_dump($arrayAcess['cunhados']['cunhado3']);

lesson_obs("Sobrinhos");
var_dump($arrayAcess['sobrinhos']);

$countFamilia = sizeof($arrayAcess['pais']);
$countFamilia += sizeof($arrayAcess['filhos']);
$countFamilia += sizeof($arrayAcess['cunhados']);
$countFamilia += sizeof($arrayAcess['sobrinhos']);


echo "<p>Minha família tem " . $countFamilia . " pessoas</p>";


lesson_obs("Mostrar todos filhos com foreach");
foreach($arrayAcess['filhos'] as $member) {
    echo "<p>{$member}</p>";
}

$article = "<article><h1>%s</h1><p>%s</p><p>%s</p><p>%s</p><p>%s</p></article>";

vprintf($article, $arrayAcess['filhos']);

require __DIR__ . "/../_shared/footer.php";