<?php


class FConnectionDB
{
    private static $instance;

    public function __construct() {}

    public static function connect() {

        if (!isset(self::$instance)) {

            try {
                self::$instance = new PDO ("mysql:host=" . $GLOBALS['hostname'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['user'], $GLOBALS['pass']);

            } catch (PDOException $e) {
                echo "Errore nel costruttore di FConnectionDB: " . $e->getMessage();
                die;
            }
        }
        return self::$instance;

        }

    public static function closeConnection(){
        self::$instance = null;
    }

    }





