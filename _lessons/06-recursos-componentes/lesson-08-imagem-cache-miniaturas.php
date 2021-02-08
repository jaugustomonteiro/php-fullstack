<?php

use Source\Support\Thumb;

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/vendor/autoload.php";

heder_lesson("Recursos e components <br> Imagem, cache e miniatura");

lesson_title("Cropper", __LINE__);

$t = new Thumb();
var_dump($t);




lesson_title("Generate", __LINE__);

echo "<img src='{$t->make("images/2021/02/image.jpg", 300)}' alt='' title=''>";
echo "<img src='{$t->make("images/2021/02/image.jpg", 180, 180)}' alt='' title=''>";

var_dump($t->make("image.jpg", 100));

echo "<img src='{$t->make("images/2021/02/image.png", 300)}' alt='' title=''>";
echo "<img src='{$t->make("images/2021/02/image.png", 180, 180)}' alt='' title=''>";


// $t->flush("images/2021/02/image.png");

/****************************************************************
 *  echo "<p>" . COURSE . "</p>";                               *
 *  lesson_title($title = "include include_ondce", __LINE__);   *
 *  heder_lesson("Requisição de arquivos");                     *
 *  lesson_obs("bolean");                                       *
 ****************************************************************/
require __DIR__ . "/../_shared/footer.php";