<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

session();

heder_lesson("Segurança e Boas Práticas <br> Mitigando ataques XSS e CSRF");

lesson_title("xxs", __LINE__);
lesson_obs("[ XSS ] Cross-Site Scripting");

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if($post) {
    $data = (object)$post;
    var_dump($post, $data->first_name);
}

lesson_title("csrf", __LINE__);

if($_REQUEST && !csrf_verify($_REQUEST)) {
    var_dump("CSRF BLOQUED!");
}
else {
    var_dump($_REQUEST);
}



lesson_title("form", __LINE__);

require __DIR__ . "/form.php";

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";