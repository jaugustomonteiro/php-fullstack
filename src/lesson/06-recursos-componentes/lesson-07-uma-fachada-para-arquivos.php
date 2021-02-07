<?php

ini_set('xdebug.max_nesting_level', 100);

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Uma fachada para arquivos");

use Source\Support\Upload;

/**
 * IMAGE
 */
lesson_title("Image", __LINE__);

$upload = new Upload();

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
if($post && $post['send'] == "image") {
    
    $u = $upload->image($_FILES['file'], $post['name'], 500);
    if($u) {
        echo "<img src='{$u}' style='width: 100%'>";
    }
    else {
        echo $upload->message();
    }
}


$formSend = "image";
require __DIR__ . "./../06-recursos-componentes/form-upload.php";

/**
 * FILE
 */
lesson_title("File", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
if($post && $post['send'] == "file") {
   
    $u = $upload->file($_FILES['file'], $post['name']);
    if($u) {
        lesson_message("<a target='_blank' href='{$u}'>Ver Arquivo</a>");
    }
    else {
        echo $upload->message();
    }
}


$formSend = "file";
require __DIR__ . "./../06-recursos-componentes/form-upload.php";


lesson_title("Media", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
if($post && $post['send'] == "media") {
    var_dump(
        $post,
        ($_FILES ?? "")
    );

    $u = $upload->media($_FILES['file'], $post['name']);
    if($u) {
        lesson_message("<a target='_blank' href='{$u}'>Ver Arquivo</a>");
    }
    else {
        echo $upload->message();
    }
}
$formSend = "media";
require __DIR__ . "./../06-recursos-componentes/form-upload.php";


lesson_title("Remove", __LINE__);

echo __DIR__ . "/storage/uploads/medias/2021/02/um-video.mp4";

$upload->remove(__DIR__ . "/storage/uploads/medias/2021/02/nome-do-arquivo.mp4");

/****************************************************************
 *  echo "<p>" . COURSE . "</p>";                               *
 *  lesson_title($title = "include include_ondce", __LINE__);   *
 *  heder_lesson("Requisição de arquivos");                     *
 *  lesson_obs("bolean");                                       *
 ****************************************************************/
require __DIR__ . "/../_shared/footer.php";