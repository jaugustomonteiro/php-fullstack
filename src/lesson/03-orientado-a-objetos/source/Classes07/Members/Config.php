<?php

namespace Source\Classes07\Members;

class Config {

    public const COMPANY = "JAML";
    protected const DOMAIN = "jaml.com.br";
    private const SECTOR = "Educação";

    public static $company;
    public static $domain;
    public static $sector;


    public static function setConfig($company, $domain, $sector) {
        self::$company = $company;
        self::$domain = $domain;
        self::$sector = $sector;
    }

} 