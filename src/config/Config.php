<?php

namespace Amaur\App\config;

/**
 * Class config
 * @package Amaur\App\config
 */
class Config {
    public const HOST = "";
    public const DB_NAME = "";
    public const USERNAME = "";
    public const PASSWORD = "";

    public static function getConfig(): array {
        return [
            self::HOST,
            self::DB_NAME,
            self::USERNAME,
            self::PASSWORD,
        ];
    }
}