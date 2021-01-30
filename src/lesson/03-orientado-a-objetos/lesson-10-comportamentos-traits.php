<?php



require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Orientado a objeto <br> Comportamentos com traits");

use Source\Classes10\Traits\Address;
use Source\Classes10\Traits\Cart;
use Source\Classes10\Traits\Register;
use Source\Classes10\Traits\User;

/*
 * [ trait ] São traços de código que podem ser reutilizados por mais de uma classe. Um trait é como um compoetamento do objeto (BEHAVES LIKE).
 * http://php.net/manual/pt_BR/language.oop5.traits.php
 */
lesson_title("Traits", __LINE__);
lesson_obs("[ traits ] São traços de código que podem ser reutilizados por mais de uma classe. Um trait é como um compoetamento do objeto (BEHAVES LIKE)");

$user = new User(
    "Augusto",
    "Monteiro",
    "jamonteirolimla@gmail.com"
);

$address = new Address(
    "Qno 18 Conjunto 24",
    7,
    "Casa, Expansão do Setor O"
);

$register = new Register($user, $address);


var_dump($user, $address);

var_dump(
    $register, 
    $register->getUser(), 
    $register->getAddress(),
    $register->getUser()->getFirstName(),
    $register->getAddress()->getStreet() . " " . $register->getAddress()->getNumber() . " - " . $register->getAddress()->getComplement()
);


$cart = new Cart();

$cart->add( 1,
    "HTML 5",
    1,
    50
);

$cart->add(
    2,
    "CSS 3",
    2,
    "99"
);

$cart->add(
    3,
    "Javascript",
    4,
    "121"
);

$cart->remove(2, 1);

$cart->remove(3, 3);

$cart->checkout($user, $address);


var_dump($cart);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";