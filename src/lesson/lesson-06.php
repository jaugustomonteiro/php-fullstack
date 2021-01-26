<?php


require __DIR__ . "/shared/header.php";

heder_lesson("Manipulação e Tratamentos <br> Manipulação de arquivos");

lesson_title($title = "Verificação", __LINE__);

$file = __DIR__ . "/file.txt";

lesson_tag($file);

lesson_obs("file_exists => verifica se existe | is_file => verifica se é um arquivo");
if(file_exists($file) && is_file($file)) {
    echo "<p>Arquivo existe!</p>";
}
else {
    echo "<p>Arquivo não existe</p>";
}



lesson_title($title = "Leitura e gravação", __LINE__);

if(!file_exists($file) && !is_file($file)) {
    $fileOpen = fopen($file, "w");
    fwrite($fileOpen, "Linha 01" . PHP_EOL);
    fwrite($fileOpen, "Linha 02" . PHP_EOL);
    fwrite($fileOpen, "Linha 03" . PHP_EOL);
    fwrite($fileOpen, "Linha 04" . PHP_EOL);
    fclose($fileOpen);
}
else {
    var_dump(
        file($file),
        pathinfo($file)
    );
}

$path = pathinfo($file);

var_dump(
    [
        $path['dirname'],
        $path['basename'],
        $path['extension'],
        $path['filename'],
    ]
);

echo "<p>" . file($file)[3] . "</p>";


// lesson_obs("Abrir arquivo com foreach");
// foreach (file($file) as  $file) {
//     echo "<p>" . $file . "</p>";
// }

lesson_obs("Abrir arquivo com fopen");

$open = fopen($file, 'r');
while (!feof($open)) {
    echo "<p>" . fgets($open) . "</p>";
}
fclose($open);

lesson_title($title = "get, put, content", __LINE__);

$getContents = __DIR__ . "/teste2.php";

if(file_exists($getContents) && is_file($getContents)) {
    echo file_get_contents($getContents);
}
else {
    $data = "<article><h1>Augusto Monteiro</h1><p>JAML<br><strong>jamonteirolima@gmail.com</strong></p></article>
    ";
    file_put_contents($getContents, $data);
    echo file_get_contents($getContents);
}

lesson_tag("Deletar arquivos");
// unlink($file);
// unlink($getContents);

$fileDeleted = __DIR__ . "/teste3.php";


if(file_exists($fileDeleted) && is_file($fileDeleted)) {
    unlink($fileDeleted);
}
else {
    echo "<p>Arquivo não existe</p>";
}



/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ .  "/shared/footer.php";