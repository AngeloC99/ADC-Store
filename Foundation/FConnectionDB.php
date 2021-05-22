<?php


class FConnectionDB
{
    private static $instance=null;  //con Singleton

    private function __construct (string $host, string $database, string $username, string $password)
    {
        try {
            $this->instance = new PDO ("mysql:host=".$host.";dbname=".$database,$username,$password);

        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
            die;
        }

    }

    /**
     * @return PDO
     */
    public static function connect(string $host, string $database, string $username, string $password): PDO
    {
        if (self::$instance == null) {
            self::$instance = new FConnectionDB( $host,  $database,  $username,  $password);
        }
        return self::$instance;
    }
}