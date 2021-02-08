<?php


require __DIR__ . "/../_shared/footer.php";

heder_lesson("Manipulação e Tratamentos <br> Gestão de Diretórios");

lesson_title($title = "Verificar, criar e abrir", __LINE__);

$folder = __DIR__ . "/uploads";

if(!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
}
else {
    var_dump(scandir($folder));
}

lesson_title($title = "Copiar e renomear", __LINE__);

$file = __DIR__ . "/file.txt";
//mkdir(__DIR__ . "/tmp");

var_dump([
    pathinfo($file),
    scandir($folder),
    scandir(__DIR__),
]);

if(!file_exists($file) || !is_file($file)) {
    fopen($file, "w");
}
else {
    //var_dump(filemtime($file), filemtime(__DIR__ . "/uploads/file.txt"));
    // copy($file, $folder . "/" . basename($file));
    // rename(__DIR__ . "/uploads/file.txt", __DIR__ . "/uploads/" . time() . "." . pathinfo($file)['extension']);
    rename($file, __DIR__ . "/uploads/" . time() . "." . pathinfo($file)['extension']);
}

lesson_title($title = "Remover e deletar", __LINE__);

//mkdir("remove", 777);

// rmdir(__DIR__ . "/remove");

$dirRemove = __DIR__ . "/remove";
$diffFile = array_diff(scandir($dirRemove), ['.', '..']);
$dirCount = count($diffFile);

var_dump([
    $dirRemove,
    $diffFile,
    $dirCount
]);

if($dirCount >= 1) {
    echo "<p>clear...</p>";
    foreach (scandir($dirRemove) as $fileItem) {
        $fileItem = __DIR__ . "/remove/{$fileItem}";
        if(file_exists($fileItem) && is_file($fileItem)) {
            unlink($fileItem);
        } 
    }
}
else {
    echo "<p>Esta pasta está vazia...</p>"; 
    rmdir($dirRemove);
}

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";

