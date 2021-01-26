<?php

require "../../shared/header.php";

heder_lesson("Comandos de saída");

lesson_title($title = "echo", __LINE__);

echo "<h3>Olá mundo!<span class='tag'>Bora coda!</span></h3>";

$hello = "Olá mundo";
$code = "<span class='tag'>Bora coda!</span>";

echo "<p>$hello</p>";

echo '<p>Hello<span class="tag">\'\' Aspas simples o php não interpreta o código</span></p>';

$day = "dia";

echo "<p>Faltam 2 {$day}s para o evendo<span class='tag'>{} Exemplo de variável protegida</span></p>";

echo "<h3>{$hello}</h3>";
echo "<h4>{$hello} {$code}</h4>";

echo '<h3>' . $hello . " " .  $code . '</h3>';
?>
<h4><?=$hello?> <?=$code?></h4>

<?php

lesson_title($title = "print", __LINE__);

print $hello;
print $code;

print "<h3>{$hello} {$code}</h3>";

lesson_title($title = "print_r", __LINE__);
lesson_obs("Imprime array");

$array = array(
    "company"   => "JAML",
    "couser"    => "FSPHP",
    "class"     => "Comandos de Saída"
);

echo "<pre>" , print_r($array) , "</pre>";
echo "<pre>" , print_r($array, 1) , "</pre>";


lesson_title($title = "printf", __LINE__);

lesson_obs("Dar saida em uma variável formatada");

$article = "<article><h1>%s</h1><p>%s</p></article>";

$title = "{$hello} {$code}";
$subtitle = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, dolorem!";
printf($article, $title, $subtitle);

lesson_title($title = "vprintf", __LINE__);

lesson_obs("Dar saida em uma variável formatada com array");



$title = "{$hello} {$code}";
$subtitle = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, dolorem!";

$info_array = array(
    "title" => $title,
    "subtitle" => $subtitle
);
    
vprintf($article, $info_array);


lesson_title($title = "var_dump", __LINE__);

lesson_obs("Debugar código");

$data = array(
    "nome" => "Augusto",
    "sobre_nome" => "Monteiro",
    "email" => "jamonteirolima@gmail.com"
);

var_dump($data);

require "../../shared/footer.php";
