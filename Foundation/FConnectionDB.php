<?php


class FConnectionDB
{
    private static $instance=null;  //con Singleton


    public function __construct ()
    {
        try {
            self::$instance = new PDO ("mysql:host=".$GLOBALS['hostname'].";dbname=".$GLOBALS['dbname'],$GLOBALS['user'],$GLOBALS['pass']);

        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
            die;
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
        return self::$instance;
    }
}