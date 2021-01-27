<?php

require __DIR__ . "/shared/header.php";

heder_lesson("Manipulação e Tratamentos <br> Funcões para Arrays");

lesson_title($title = "Manipulação", __LINE__);

$index = [
    "Marilene",
    "Augusto",
    "Flávia",
    "Márlon",
    "Márcio"
];

array_unshift($index, "Junior");
array_unshift($index, "Kaleb");
array_push($index, "Francisco");
array_push($index, "Maupimo");

$assoc = [
    "as1" => "Marilene",
    "as2" => "Augusto",
    "as3" => "Flávia",
    "as4" => "Márlon",
    "as5" => "Márcio"
];

$assoc = ["as6" => "Kaleb", "as7" => "Junior"] + $assoc;
$assoc = $assoc + ["as8" => "Francisco", "as9" => "Maupimo"];

var_dump(
    $index,
    $assoc
);

lesson_obs("array_shift => remove o primeiro elemento");
array_shift($index);
array_shift($assoc);

lesson_obs("array_pop => remove o último elemento");
array_pop($index);
array_pop($assoc);

var_dump(
    $index,
    $assoc
);

$index = array_filter($index);



lesson_obs("array_unshift => adiciona um elemento no início");
array_unshift($index, "");
array_unshift($assoc, "");

var_dump(
    $index,
    $assoc
);

lesson_obs("array_filter => remove elemento vazios");
$index = array_filter($index);
$assoc = array_filter($assoc);

var_dump(
    $index,
    $assoc
);


lesson_title($title = "Ordenação", __LINE__);


lesson_obs("array_reverse => Inverte a ordem");
$index = array_reverse($index);
$assoc = array_reverse($assoc);

var_dump(
    $index,
    $assoc
);


lesson_obs("asort => Ordenar pelo valor");
asort($index);
asort($assoc);

var_dump(
    $index,
    $assoc
);

lesson_obs("ksort => Ordenar pelo key");
ksort($index);
ksort($assoc);

var_dump(
    $index,
    $assoc
);

lesson_obs("ksort => Ordenar pelo key iverte a ordem");
krsort($index);
krsort($assoc);

var_dump(
    $index,
    $assoc
);

/*
lesson_obs("sort => Ordenar e reinicia o array");
sort($index);
sort($assoc);

var_dump(
    $index,
    $assoc
);

lesson_obs("rsort => Ordenar, inverte e reinicia o array");
rsort($index);
rsort($assoc);

var_dump(
    $index,
    $assoc
);
*/


lesson_title($title = "Verificação", __LINE__);


var_dump(
    [
        array_keys($assoc),
        array_values($assoc)
    ]
);

$value = "Marilene1";

if(in_array($value, $assoc)) {    
    echo "<p>" . "Você achou o {$value}" . "</p>";
}
else {
    echo "<p>" . "Você não achou o {$value}" . "</p>";
}

$arrayToString = implode(', ', $assoc);

var_dump(
    $assoc,
    $arrayToString
);


var_dump(explode(', ', $arrayToString));

lesson_title($title = "Exemplo prático", __LINE__);

$profile = [
    "name"      => "Augusto Monteiro",
    "age"    => 43,
    "email"     => "jamonteirolima@gmail.com"
];

var_dump($profile);

$template = <<<TPL
<article>
    <h1>{{name}}</h1>
    <h2>{{email}}</h2>
    <p>{{age}} Anos</p>
</article>
TPL;

echo $template;

echo str_replace(array_keys($profile), array_values($profile), $template);

$replace =  "{{" . implode("}}&{{", array_keys($profile)) . "}}";

echo str_replace(explode("&", $replace), array_values($profile), $template);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ .  "/shared/footer.php";