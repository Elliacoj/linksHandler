<?php

namespace Amaur\App\manager;

use Amaur\App\config\Config;
use Amaur\App\config\ConfigDev;
use PDO;
use PDOException;

class Db {

    private static ?PDO $dbInstance = null;

    /**
     * Db constructor.
     */
    public function __construct() {

        if(file_exists(dirname(__FILE__) . '/../config/ConfigDev.php') && $_SERVER['SERVER_NAME'] !== "localhost") {
            [$host, $dbname, $username, $password] = ConfigDev::getConfig();
        }
        else {
            [$host, $dbname, $username, $password] = Config::getConfig();
        }

        try {
            self::$dbInstance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception) {
            echo $exception->getMessage();
        }

    }

    /**
     * Get a instance PDO
     * @return PDO
     */
    public static function getInstance():PDO {
        if(is_null(self::$dbInstance)) {
            new self();
        }
        return self::$dbInstance;
    }

    /**
     * For no clone
     */
    public function __clone() {}
}