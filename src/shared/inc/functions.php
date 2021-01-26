<?php



header("Content-Type: text/html; charset=utf-8");

date_default_timezone_set("America/Sao_Paulo");
/*
ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);
ini_set('xdebug.overload_var_dump', 1);
*/

set_error_handler("phpError");

$server_host = $_SERVER['HTTP_HOST'];

function phpError($error, $message, $file, $line) {
    $color = ($error == E_USER_ERROR ? "red" : "yellow");
    echo "<div class='message message-warning'>[ Linha {$line} ] <strong>{$message}</strong><small>{$file}</small></div>";
}

function heder_lesson($lesson = "lesson") {
    echo "<strong class='header-lesson'>{$lesson}</strong><hr />";
}

function lesson_title($title = "lesson", $line = __LINE__) {
    echo "<h5 class='lesson-title'>[ {$title} | <span>Linha " . $line . "</span> ]</h5>";
}

function lesson_obs($title = "tag") {
    echo "<span class='obs'>{$title}</span>";
}

function lesson_tag($title = "tag") {
    echo "<span class='spantag'>{$title}</span>" . PHP_EOL;
}