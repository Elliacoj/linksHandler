<?php


class Db {
    private string $host = "";
    private string $dbname = "";
    private string $username = "";
    private string $password = "";

    private static ?PDO $dbInstance = null;

    /**
     * Db constructor.
     */
    public function __construct() {
        self::$dbInstance = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->password);
        self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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