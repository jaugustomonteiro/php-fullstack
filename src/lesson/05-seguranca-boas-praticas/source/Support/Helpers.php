<?php

use Source\Core\Connect;
use Source\Core\Message;
use Source\Core\Session;
use Source\Models\User;

/**
 * ####################
 * ###   VALIDATE   ###
 * ###################
 */

/**
  * @param string $email
  * @return boolean
  */
function is_email(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $password
 * @return boolean
 */
function is_password(string $password): bool {
    return (mb_strlen($password) >= CONF_PASSWORD_MIN_LEN && mb_strlen($password) <= CONF_PASSWORD_MAX_LEN ? true : false);
}


/**
 * ##################
 * ###   STRING   ###
 * ##################
 */

/**
 * @param string $string
 * @return string
 */
function str_slug(string $string): string {

    $string = filter_var(mb_strtolower($string), FILTER_SANITIZE_STRIPPED);
    $formats = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
    $replace = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

    return str_replace(["-----", "----", "---", "--"], "-",
        str_replace(" ", "-",
            trim(strtr(utf8_decode($string), utf8_decode($formats), $replace))
        )
    );    
}

/**
 * @param string $string
 * @return string
 */
function str_studly_case(string $string): string {
    $string = str_slug($string);
    return str_replace(" ", "", mb_convert_case(str_replace("-", " ", $string), MB_CASE_TITLE));
}

/**
 * @param string $string
 * @return string
 */
function str_camel_case(string $string): string {
    return lcfirst(str_studly_case($string));
}

/**
 * @param string $string
 * @return string
 */
function str_title(string $string): string {
    return mb_convert_case(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS), MB_CASE_TITLE);
}

/**
 * @param string $string
 * @param integer $limit
 * @param string $pointer
 * @return string
 */
function str_limit_words(string $string, int $limit, string $pointer = "..."): string {
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    $arrWords = explode(" ", $string);
    $numWords = count($arrWords);
    
    if($numWords < $limit) {
        return $string;
    }

    return implode(" ", array_slice($arrWords, 0, $limit)) . $pointer;
    
}

/**
 * @param string $string
 * @param integer $limit
 * @param string $pointer
 * @return string
 */
function str_limit_chars(string $string, int $limit, string $pointer = "..."): string {
    $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
    if(mb_strlen($string) <= $limit) {
        return $string;
    }

    return mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " ")) . $pointer;
}


/**
 * ##################
 * ###   STRING   ###
 * ##################
 */

 /**
  * @param string $url
  * @return string
  */
function url(string $path): string {
    return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

/**
 * @param string $url
 * @return void
 */
function redirect(string $url): void {
    header("HTTP/1.1 302 Redirect");
    if(filter_var($url, FILTER_VALIDATE_URL)) {
        header("location: {$url}");
        exit;
    }

    $location = url($url);
    header("location: {$location}");
    exit;
}


/**
 * ################
 * ###   CORE   ###
 * ################
 */


/**
  * @return PDO
  */
function db(): PDO {
    return Connect::getInstance();
}

/**
 * @return Message
 */
function message(): Message {
    return new Message();
}

/**
 * @return Session
 */
function session(): Session {
    return new Session();
}

/**
 * #################
 * ###   MODEL   ###
 * #################
 */


/**
 * @return User
 */
function user(): User {
    return new User();
}


