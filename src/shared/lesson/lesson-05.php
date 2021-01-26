<?php

require "../../shared/header.php";

heder_lesson("Estruturas de controle");

/*
lesson_obs("bolean");
*/

lesson_title($title = "if, elseif, esle", __LINE__);

$test = false;

if($test) {
    var_dump(true);
}
else {
    var_dump(false);
}

$age = 55;

if($age < 18) {
    var_dump('Vocé é um adolecente');
}
elseif($age > 17 && $age < 54) {
    var_dump('Vocé é um adulto');
}
else {
    var_dump('Voce é um velho');
}

$hour = 0;

if($hour >= 6 && $hour <= 11) {
    var_dump("bom dia");
}
elseif($hour >= 12 && $hour <= 18) {
    var_dump("boa tarde");
}
elseif($hour >= 19 && $hour <= 23) {
    var_dump("boa noite");
}
else {
    var_dump("boa madrugada");
}

lesson_title($title = "isset, empty, !", __LINE__);

$musica = "Boogie woogie";

lesson_obs("isset => variável existe com ou sem valor");

if(isset($musica)) {
    var_dump("Música existe");
} else {
    var_dump('Die');
}

lesson_obs("empty => variável existe e tem valor");

if(empty($musica)) {
    var_dump("Música não tem conteudo");
} else {
    var_dump('Música tem conteudo');
}

if(!empty($musica)) {
    var_dump("Música tem conteudo");
} else {
    var_dump('Música não tem conteudo');
}

lesson_title($title = "switch", __LINE__);

$payment = "credit_card";

switch($payment) {
    case "billet_printed":
        var_dump("Bilhete impresso");
        break;
    case "canceled":
        var_dump("Pagamento cancelado");
        break;
    case "past_due":
    case "pending":
        var_dump("Pagamento pendente");
        break;
    case "approved":
    case "completed":
        var_dump("Pagamento aprovado");
        break;  
    default:
        var_dump("Erro ao processar pagamento");
        break;      
};







require "../../shared/footer.php";