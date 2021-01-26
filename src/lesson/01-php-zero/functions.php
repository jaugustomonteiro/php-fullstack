<?php

function functionName($arg1, $arg2, $arg3) {

    $body = [$arg1, $arg2, $arg3];
    return $body;
}


function optionsArgs($arg1, $arg2 = true, $arg3 = null) {
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

function calcImc() {
    global $weight;
    global $height;

    return $weight / ($height * $height);
}

function payTotal($price) {
    static $total;
    $total += $price;
    return "R$ " . number_format($total, 2, "," , ".");
}

function myTeam() {
    $teamName = func_get_args();
    $teamCount = func_num_args();
    return ["members" => $teamName, "count" => $teamCount];
}