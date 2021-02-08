<?php

require __DIR__ . "/../_shared/footer.php";



heder_lesson("Manipulação e Tratamentos <br> Manipulação de datas");

lesson_title($title = "a função date", __LINE__);

var_dump([
    date_default_timezone_get(),
    date(DATE_W3C),
    date("d/m/Y H:i:s"),
    date("d-m-Y H:i:s"),
    date("d-m-Y") . " às " . date('H:i:s'),
]);


define("DATE_BR", "d/m/Y H:i:s");
/*
define("DATE_TIMEZONE", "Pacific/Apia");

date_default_timezone_set(DATE_TIMEZONE);

var_dump(
    [
        date(DATE_BR),
        date_default_timezone_get()
    ]
);
*/

var_dump(getdate());

echo "<p>Hoje é dia " . getdate()["mday"] . "</p>";

lesson_title($title = "string to date", __LINE__);

var_dump([
    "strtotime NOW      " => strtotime("now"),
    "time               " => time(),
    "strtotime+10d      " => strtotime("+10days"),
    "date DATE_BR       " => date(DATE_BR),
    "date DATE_BR+10d   " => date(DATE_BR, strtotime("+10days")),
    "date DATE_BR-10d   " => date(DATE_BR, strtotime("-10days")),
    "date DATE_BR+1year " => date(DATE_BR, strtotime("+1year")),
    "date DATE_BR+1years" => date(DATE_BR, strtotime("+1years")),
]);


$format = "%d/%m/%Y %Hh:%Mmin";

echo "<p>A data de hoje é " . strftime($format) . "</p>"; 
echo "<p> " . strftime("Hoje é dia %d/%m/%Y às %H horas e %M minutos. Tenha um excelente dia") . "</p>"; 

/*
echo "<p>" . COURSE . "</p>";
lesson_title($title = "include include_ondce", __LINE__);
heder_lesson("Requisição de arquivos");
lesson_obs("bolean");
*/
require __DIR__ . "/../_shared/footer.php";