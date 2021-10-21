<?php

namespace Amaur\App\Manager;

use Amaur\App\Config\Config;
use Amaur\App\Config\ConfigDev;
use PDO;
use PDOException;

class Db {

    private static ?PDO $dbInstance = null;

    /**
     * Db constructor.
     */
    public function __construct() {

        if(file_exists(dirname(__FILE__) . '/../../ConfigDev.php')) {
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