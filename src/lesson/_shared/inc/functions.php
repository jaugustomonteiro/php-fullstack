<?php



header("Content-Type: text/html; charset=utf-8");

date_default_timezone_set("America/Sao_Paulo");

set_error_handler("phpError");

opcache_reset();
opcache_invalidate(__FILE__, true);
/*
ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);
ini_set('xdebug.overload_var_dump', 1);
*/



$server_host = $_SERVER['HTTP_HOST'];

function phpError($error, $message, $file, $line) {
    // $color = ($error == E_USER_ERROR ? "red" : "yellow");
    echo "<div class='message message-warning'>[ Linha {$line} ] <strong>{$message}</strong><br /><small>{$file}</small></div>";
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

function lesson_message($message = "Atenção", $type = "warning") {
    echo "<div class='message message-" . $type . "'><i class='bx bx-info-circle' style='margin-right: 5px; font-size: 1.5rem'></i>" . $message . "</div>";
} 