<?php



header("Content-Type: text/html; charset=utf-8");

date_default_timezone_set("America/Sao_Paulo");

$server_host = $_SERVER['HTTP_HOST'];

function heder_lesson($lesson = "lesson") {
    echo "<strong class='header-lesson'>{$lesson}</strong><hr />";
}

function lesson_title($title = "lesson", $line = __LINE__) {
    echo "<h2 class='lesson-title'>[ {$title} | <span>Linha " . $line . "</span> ]</h2>";
}

function lesson_obs($title = "tag") {
    echo "<span class='obs'>{$title}</span>";
}