<?php


class FConnectionDB
{
    private static $instance=null;  //con Singleton
    private static $db;


    public function __construct ()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO ("mysql:host=" . $GLOBALS['hostname'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['user'], $GLOBALS['pass']);

            } catch (PDOException $e) {
                echo "Errore nel costruttore di FConnectionDB: " . $e->getMessage();
                die;
            }
        }

    }

    /**
     * @return PDO
     */
    public static function connect(): PDO
    {
        if (self::$instance == null) {
            self::$instance = new FConnectionDB();
        }
        return self::$db;
    }
}