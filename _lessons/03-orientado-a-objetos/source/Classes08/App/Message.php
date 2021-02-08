<?php

namespace Source\Classes08\App;

use ReflectionClass;

class Message {

    private const MESSAGE = "message";
    public const SUCCESS = "success";
    public const DANGER = "danger";
    public const WARNING = "warning";

    private static $message;
    private static $errorType;
    private static $error;

    public static function show($message, $errorType = "warning") {
        self::setError($message, $errorType);
        echo self::$error;
    }

    public static function push($message, $errorType = "warning") {
        self::setError($message, $errorType);
        return self::$error;
    }

    private static function setError($message, $errorType) {
        $reflection = new ReflectionClass(__CLASS__);
        $errorTypes = $reflection->getConstants();

        $iconMessage = 'warning';
        
        if($errorType == 'success') {
            $iconMessage = 'bx-check-circle';
        }
        elseif($errorType == 'danger') {
            $iconMessage = 'bx-x-circle';
        }
        else {
            $iconMessage = 'bx-info-circle';
        }

        self::$message = $message;
        self::$errorType = (!empty($errorType) || in_array($errorType, $errorTypes) ? "{$errorType}" : "");
        self::$error = "<div class='" . self::MESSAGE . " message-" . self::$errorType . "'><i class='bx " . $iconMessage . "' style='margin-right: 5px; font-size: 1.5rem'></i>" . self::$message . "</div>";
    }

}