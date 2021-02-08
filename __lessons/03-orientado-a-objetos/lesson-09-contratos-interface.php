<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Orientado a objeto <br> Contratos com interface");

use Source\Classes09\Contracts\Login;
use Source\Classes09\Contracts\User;
use Source\Classes09\Contracts\UserAdmin;

/**
 * [ implementacão ] Um contrato de quais métodos a classe deve implementar
 */
lesson_title("Implementação", __LINE__);
lesson_obs("[ implementacão ] Um contrato de quais métodos a classe deve implementar");

$user = new User(
    "Maupimo",
    "Junior",
    "maupimo@gmail.com",
);


$admin = new UserAdmin(
    "Augusto",
    "Monteiro",
    "jamonteirolima@gmail.com"
);

var_dump(
    $user,
    $admin
);

lesson_title("Associação", __LINE__);


$login = new Login();

$loginUser = $login->loginUser($user);
$loginAdmin = $login->loginUser($admin);

// $login->loginUser($admin);
// $login->loginAdmin($user);

var_dump($loginUser, $loginAdmin);


/*
 * [ dependência ] Dependency Injection ou DI, é um contrato de relação entre objetos, onde um método assina seus atributos com uma interface.
 */
lesson_title("Dependência", __LINE__);
lesson_obs("[ dependência ] Dependency Injection ou DI, é um contrato de relação entre objetos, onde um método assina seus atributos com uma interface.");

var_dump(
    $login->login($user),
    $login->login($user)->getFirstName(),
    $login->login($admin),
    $login->login($admin)->getFirstName(),
);

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";