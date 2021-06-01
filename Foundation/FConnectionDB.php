<?php

/**
 * È la classe responsabile della connessione, tramite PDO, al database e implementa il Singleton.
 * Class FConnectionDB
 * @package Foundation
 */
class FConnectionDB
{
    /**
     * Istanza della classe.
     * @var FConnectionDB
     */
    private static $instance;

    /**
     * Implementa il metodo getInstance() del Singleton.
     * @return PDO
     */
    public static function connect() {

        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO ("mysql:host=" . $GLOBALS['hostname'] . ";dbname=" . $GLOBALS['dbname'], $GLOBALS['user'], $GLOBALS['pass']);

            } catch (PDOException $e) {
                echo "Errore in FConnectionDB: " . $e->getMessage();
                die;
            }
        }

        return self::$instance;
    }
}





