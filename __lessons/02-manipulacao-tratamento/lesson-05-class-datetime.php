<?php


require __DIR__ . "/../_shared/footer.php";

heder_lesson("Manipulação e Tratamentos <br> Uma classe Datetime");

define("DATEBR", "d/m/Y H:i:s");

lesson_title($title = "A classe Datetime", __LINE__);

$dateNow = new DateTime();

var_dump([
    "class"     => get_class($dateNow),
    "methods"   => get_class_methods($dateNow),
    "vars"      => get_object_vars($dateNow),
    "parent"    => get_parent_class($dateNow),
    "subclass"  => is_subclass_of($dateNow, "Exception")
]);

$dateBirth = new DateTime("1977-06-17");
$dateStatic = DateTime::createFromFormat(DATEBR, "17/06/1977 00:00:00");

var_dump([
    $dateNow,
    $dateBirth,
    $dateStatic
]);

var_dump([
    $dateNow->format(DATEBR),
    $dateNow->format('d'),
    $dateNow->format('m'),
    $dateNow->format('Y'),
]);

echo "<p>Hoje é dia {$dateNow->format('d')} do {$dateNow->format('m')} de {$dateNow->format('Y')}</p>";


$newTimeZone = new DateTimeZone("Pacific/Apia");
$newDateTime = new DateTime("now", $newTimeZone);

var_dump([
    "class"     => get_class($newTimeZone),
    "methods"   => get_class_methods($newTimeZone),
    "vars"      => get_object_vars($newTimeZone),
    "parent"    => get_parent_class($newTimeZone),
    "subclass"  => is_subclass_of($newTimeZone, "DateTime")
]);


var_dump([
    $newTimeZone,
    $newDateTime,
    $dateNow
]);


lesson_title($title = "A Classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P1Y");

var_dump([
    $dateInterval
]);

$dateTime = new DateTime("now");
$dateTime->add($dateInterval);

var_dump([
    $dateTime 
]);

$dateBirth = new DateTime("2020-06-17");
$dateNow = new DateTime("now");
$dateDiff = $dateNow->diff($dateBirth);

var_dump([
    $dateBirth,
    $dateNow,
    $dateDiff
]);

if($dateDiff->invert) {
    echo "<p>Seu aniversário é "  . $dateBirth->format('d/m/Y') .  ", e  já passou</p>";
    echo "<p>Seu aniversário foi a "  . $dateDiff->days .  " dias , e  já passou</p>";
}
else {
    echo "<p>Seu aniversário foi "  . $dateBirth->format('d/m/Y') .  ", e não passou</p>";
    echo "<p>Faltam "  . $dateDiff->days .  " dias para seu aniversário, e não passou</p>";
}

$dateResources = new DateTime("now");

var_dump([
    $dateResources->format(DATEBR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATEBR),
    $dateResources->add(DateInterval::createFromDateString("20days"))->format(DATEBR),
]);

lesson_title($title = "A classe DatePeriod", __LINE__);

$start = new DateTime("now");
$interval = new DateInterval("P4M");
$end = new DateTime("2022-02-31");

$period = new DatePeriod($start, $interval, $end);

var_dump([
    $start->format(DATEBR),
    $interval,
    get_class_methods($interval),
    $end->format(DATEBR),
    $period->getEndDate(),
    get_class_methods($period)
]);

echo "<h1>Sua assinatura</h1>";
foreach ($period as $recurrences) {
    echo "<p>" . $recurrences->format(DATEBR) . "</p>";
}


/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";