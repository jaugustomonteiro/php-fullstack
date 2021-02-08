<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Banco de Dados com PDO <br> Regra de negócio e modelo");

use Source\Classes07\Models\Model;
use Source\Classes07\Models\UserModel;

/*
 * [ layer ] Uma classe base que implementa os métodos de persitência e serve a todos os modelos. essa é uma layer supertype.
 */
lesson_title("Layer", __LINE__);

$layer = new ReflectionClass(Model::class);

var_dump(
    $layer->getDefaultProperties(),
    $layer->getMethods()
);

/*
 * [ model ] Cada rotina em um sistema tem uma regra de negócio. Um model serve para abstrair essas rotinas se reponsabilizando pelas regras.
 */
lesson_title("Model", __LINE__);

//$model = new UserModel();

var_dump(
    $model,
    get_class_methods($model)
);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";