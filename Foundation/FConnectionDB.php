<?php


class FConnectionDB
{
    private static $instance=null;  //con Singleton

    private function __construct (string $hostname, string $dbname, string $user, string $pass)
    {
        try {
            $this->instance = new PDO ("mysql:host=".$hostname.";dbname=".$dbname,$user,$pass);

        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
            die;
        }

    }

    /**
     * @return PDO
     */
    public static function connect(string $hostname, string $dbname, string $user, string $pass): PDO
    {
        if (self::$instance == null) {
            self::$instance = new FConnectionDB( $hostname,  $dbname,  $user,  $pass);
        }
        return self::$instance;
    }
}