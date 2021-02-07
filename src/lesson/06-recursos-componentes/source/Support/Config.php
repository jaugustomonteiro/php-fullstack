<?php

/**
 * DATABASE
 */

 define("CONF_DB_HOST", "17.0.0.2");
 define("CONF_DB_USER", "root");
 define("CONF_DB_PASS", "root");
 define("CONF_DB_NAME", "phpfullstack");


/**
 * URLS
 */
 define("CONF_URL_BASE", "http://17.0.0.2:8080/src/lesson/05-seguranca-boas-praticas/lesson-05-camada-manipulacao-03.php");
 define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
 define("CONF_URL_ERROR", "/404");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");


/**
 * SESSION
 */

define("CONF_SESSION_PATH", __DIR__ . "/../../storage/sessions");


/**
 * PASSWORD
 */
define("CONF_PASSWORD_MIN_LEN", 6);
define("CONF_PASSWORD_MAX_LEN", 10);
define("CONF_PASSWORD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWORD_OPTIONS", ["cost" => 10]);

/**
 * MESSAGE
 */

define("CONF_MESSAGE_CLASS", "message");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCESS", "success");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "danger");


/**
 * ICONS
 */

define("CONF_ICON_INFO", "bx-error-circle");
define("CONF_ICON_SUCCESS", "bx-check-circle");
define("CONF_ICON_WARNING", "bx-error-circle");
define("CONF_ICON_ERROR", "bx-x-circle");


/**
 * VIEW
 */

 define("CONF_VIEW_PATH", "assets/views");
 define("CONF_VIEW_EXT", "php");


/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage/uploads");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "file");
define("CONF_UPLOAD_MEDIA_DIR", "medias");


/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * E-MAIL
 */

 define("CONF_MAIL_HOST", "smtp.sendgrid.net");
 define("CONF_MAIL_PORT", "465");
 define("CONF_MAIL_USER", "****");
 define("CONF_MAIL_PASS", "*************************************************************************************");
 define("CONF_MAIL_SENDER", [
     "name"     => "Augusto Monteiro",
     "address"  => "jamonteirolima@gmail.com"
 ]);

 define("CONF_MAIL_OPTION_LANG", "pt");
 define("CONF_MAIL_OPTION_HTML", true);
 define("CONF_MAIL_OPTION_AUTH", true);
 define("CONF_MAIL_OPTION_SECURE", "ssl");
 define("CONF_MAIL_OPTION_CHARSET", "utf-8");





 //define("CONF_", "");