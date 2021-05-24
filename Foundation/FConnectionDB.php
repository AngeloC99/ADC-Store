<?php

require_once 'configDB.php';
class FConnectionDB
{
    private static $instance=null;  //con Singleton

    private function __construct ()
    {
        try {
            $this->instance = new PDO ("mysql:host=".$GLOBALS['hostname'].";dbname=".$GLOBALS['dbname'],$GLOBALS['user'],$GLOBALS['pass']);

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