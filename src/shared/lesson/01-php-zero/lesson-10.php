<?php

require "../../shared/header.php";

heder_lesson("Constantes e constates mágicas");

lesson_title("constantes", __LINE__);

lesson_obs("Seguindo boas práticas, devem está em arquivos separados");

lesson_obs("define está em runtime da aplicação, enquanto estiver rodando a apliação, ele irá interpretar o código");
define("COURSE", "JAML");
var_dump(COURSE);

lesson_obs("const está em compiletime, ocorre antes da execução, sendo assim não é possível usar o const em uma condição");
const AUTHOR = "Augusto Monteiro";
var_dump(AUTHOR);

$formation = false;
if($formation) {
    define("COURSE_TYPE", "Formação");
}
else {
    define("COURSE_TYPE", "Curso");
}

var_dump(COURSE_TYPE);

lesson_obs("Não é possivel exibir constantes dentro de asplas duplas ou protegida. É preciso concatenar");

lesson_tag("Concatenando");
echo "<p>" . COURSE_TYPE . " - " . COURSE . " - " . AUTHOR . "</p>";

lesson_tag("Usando ponto e vírgula");
echo "<p>", COURSE_TYPE, " - ", COURSE, " - ", AUTHOR, "</p>";

class Config {
   const USER = "root";
   const PASS = "root"; 
}

echo "<p> User : " . Config::USER . "</p>";
echo "<p> Password : " . Config::PASS . "</p>";

var_dump(get_defined_constants(true)['user']);

lesson_title("constantes mágicas", __LINE__);
lesson_obs("São constantes já definidas pelo PHP, que facilitam nossa vida");

var_dump([
    __LINE__,
    __FILE__,
    __DIR__
]);

function phpFullStack() {
    return __FUNCTION__;
}

var_dump(phpFullStack());

trait MyTrait {
    public $traitName = __TRAIT__;
}

class Jaml {
    use MyTrait;
    public $className = __CLASS__;
}

var_dump(new Jaml());

require __DIR__ . "/MyClass.php";

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require "../../shared/footer.php";

var_dump(new Source\MyClass());
var_dump(Source\MyClass::class);

