<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Orientado a objeto <br> Relacionamento entre objetos");

use Source\Classes05\Company;
use Source\Classes05\Address;
use Source\Classes05\Product;
use Source\Classes05\User;

/**
 * [Associação] - É a mais comum entre objetos onde o objeto terá um atrubuto apontado e dado acesso ao outro objeto
 */
lesson_title("Associação", __LINE__);
lesson_obs("[Associação] - É a mais comum entre objetos onde o objeto terá um atrubuto apontado e dado acesso ao outro objeto");



$company = new Company();
$company->bootCompany("JAML", "Expansão do Setor O");

var_dump($company);

$address = new Address("Qno 18 conjuto 24", "5", "Expansão do Setor , Casa");
$company->boot("JAML", $address);

var_dump($company);

echo "<p>A {$company->getCompany()} tem sede na Rua {$company->getAdress()->getStreet()}, {$company->getAdress()->getComplement()}, {$company->getAdress()->getNumber()}</p>";


/**
 * [Agregação] - Em agregação tornamos um objeto externo parte do abjeto base, contudo não o referenciamos em uma propriedade  como na associação
 */
lesson_title("Agregação", __LINE__);
lesson_obs("[Agregação] - Em agregação tornamos um objeto externo parte do abjeto base, contudo não o referenciamos em uma propriedade  como na associação");


$html = new Product("HTML5", 99);
$css = new Product("CSS", 120);
$javascript = new Product("Javascript", 1500);

var_dump($html, $css, $javascript);


$company->addProduct($html);
$company->addProduct($css);
$company->addProduct($javascript);

var_dump($company);

/**
 * @var Product $product
 */
foreach ($company->getProducts() as $product) {
    echo "<p>{$product->getName()} por R$ {$product->getPrice()}</p>";
}



/**
 * [Composição] - Em composição temos um objeto base que é responsável por instanciar o objeto parte, que só existe enquanto a base existir
 */
lesson_title("Composição", __LINE__);
lesson_obs("[Composição] - Em composição temos um objeto base que é responsável por instanciar o objeto parte, que só existe enquanto a base existir");


$company->addTeamMember("Enfermeira", "Marilene", "Lima");
$company->addTeamMember("Developers", "Augusto", "Monteiro");
$company->addTeamMember("Auxiliar de Limpeza", "Flavia", "Lima");
$company->addTeamMember("Auxiliar de Estoque", "Marlon", "Lima");
$company->addTeamMember("Marceneiro", "Marcio", "Lima");

var_dump($company);

/**
 * @var User $member
 */
foreach ($company->getTeam() as $member) {
    echo "<p>{$member->getJob()}: {$member->getFirstName()} {$member->getLastName()}</p>";
}


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";