<?php

require __DIR__ . "/../_shared/header.php";

require __DIR__ . "/source/autoload.php";

heder_lesson("Orientado a objeto <br> Fundamentos da Abstracao");

use Source\Classes08\App\User;
use Source\Classes08\Bank\Account;
use Source\Classes08\Bank\AccountCurrent;
use Source\Classes08\Bank\AccountSaving;

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes, mas nunca para ser instanciada por um objeto.
 */
lesson_title("Superclass", __LINE__);
lesson_obs("[ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes, mas nunca para ser instanciada por um objeto.");
lesson_tag("Classe Abstrata => Modelo de implementação");


$augusto = new User("Augusto", "Monteiro");
//$account = new Account("0001", "111000" , $augusto, 1000);

var_dump(
    //$account,
    $augusto
);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa com suas prórpias rotinas
 */
lesson_title("Especializacao.a", __LINE__);
lesson_obs("[ especialização ] É uma classe filha que implementa a superclasse e se especializa com suas prórpias rotinas");

$saving = new AccountSaving(
    "0002",
    "222000",
    $augusto,
    0
);

var_dump($saving);

$saving->deposit(1000);
$saving->withDrawal(1500);
$saving->withDrawal(1000);
$saving->withDrawal(6);
$saving->extract();




/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa com suas prórpias rotinas
 */
lesson_title("Especializacao.b", __LINE__);
lesson_obs("[ especialização ] É uma classe filha que implementa a superclasse e se especializa com suas prórpias rotinas");

$current = new AccountCurrent(
    "0003",
    "333000",
    $augusto,
    1000,
    1000
);

var_dump($current);

$current->deposit(1000);
$current->withDrawal(2000);
$current->withDrawal(500);
$current->withDrawal(200);
$current->withDrawal(200);
$current->withDrawal(50);

$current->extract();


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";