<?php


require __DIR__ . "/shared/header.php";

heder_lesson("Manipulação e Tratamentos <br> Funcões para String");

lesson_title("upload", __LINE__);

$folder = __DIR__ . "/uploads";

if(!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0775);
    chmod($folder, 0775);
}

lesson_tag("filesize => tamanho do arquivo enviado individualmente");
lesson_tag("postsize => total de todos os arquivos enviado");


var_dump([
    "filesize"  => ini_get("upload_max_filesize"),
    "postsize"  => ini_get("post_max_size")
]);


var_dump([
    filetype(__DIR__ . "/../../index.php"),
    mime_content_type(__DIR__ . "/../../index.php"),
]);


$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

if($_FILES && !empty($_FILES['file']['name'])) {
    $fileUpload = $_FILES["file"];
    var_dump($fileUpload);

    $allowedTypes = [
        "image/jpg",
        "image/jpeg",
        "image/png",
        "video/mp4",
        "application/pdf"
    ];

    $newFilename = time() . mb_strstr($fileUpload['name'], '.');

    if(in_array($fileUpload['type'], $allowedTypes)) {
        if(move_uploaded_file($fileUpload['tmp_name'], __DIR__ . "/uploads/{$newFilename}")) {
            lesson_message("Arquivo enviado com sucesso", "success");
        }
        else {
            lesson_message("Erro inesperado", "success");
        }
    }
    else {
        lesson_message("Arquivo não permitido", "warning");
    }

}
elseif($getPost) {
    lesson_message("Arquivo muito grande", "danger");
}
else {
    if($_FILES) {
        lesson_message("Selecione um arquivo", "warning");
    }
}

require __DIR__ . "/form-upload.php";
var_dump(    scandir(__DIR__ . "/uploads"));
/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
lesson_message("Preencha todos os campos!", "warning");
*/
require __DIR__ .  "/shared/footer.php";