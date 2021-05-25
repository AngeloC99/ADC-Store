<?php

/**
 * La classe FIndirizzo garantisce la permanenza dei dati per la classe EIndirizzo.
 * Class FIndirizzo
 * @access public
 * @package Foundation
 */

class FIndirizzo
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EIndirizzo nell'apposita
     * tabella del database.
     * @param string $via
     * @param int $numerocivico
     * @param string $cap
     * @return bool
     */
    public static function exist(string $via, int $numerocivico, string $cap): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Indirizzo WHERE via=:via AND numerocivico = :numero AND cap = :cap");
        $ris = $stmt->execute(array(
            ':via' => $via,
            ':numero' => $numerocivico,
            ':cap' => $cap));
        return $ris;
    }

    /**
     * Carica in RAM l'istanza di EIndirizzo che possiede la chiave primaria fornita.
     * @param string $via
     * @param int $numerocivico
     * @param string $cap
     * @return EIndirizzo
     */
    public static function load(string $via, int $numerocivico, string $cap) : EIndirizzo {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM Indirizzo WHERE via = :via AND numerocivico = :numero AND cap = :cap");
        $stmt->execute(array(
            ':via' => $via,
            ':numero' => $numerocivico,
            ':cap' => $cap));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $com = $rows[0]['comune'];
        $prov = $rows[0]['provincia'];
        $pred = $rows[0]['predefinito'];
        $indirizzo = new EIndirizzo($via, $numerocivico, $com, $prov, $cap, $pred);
        return $indirizzo;
    }

    /**
     * Memorizza un'istanza di EIndirizzo sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param EIndirizzo $indirizzo
     * @param string $mailutente
     * @return bool
     */
    public static function store(EIndirizzo $indirizzo, string $mailutente): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO Indirizzo VALUES(:via, :numero, :cap, :comune, :provincia, :predefinito)";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute(array(
            ':via' => $indirizzo->getVia(),
            ':numero' => $indirizzo->getNumero(),
            ':cap' => $indirizzo->getCap(),
            ':comune' => $indirizzo->getComune(),
            ':provincia' => $indirizzo->getProvincia(),
            ':predefinito' => $indirizzo->isPredefinito()));

        $query1 = "INSERT INTO UtenteSalvaIndirizzo VALUES(:mailutente, :via, :numero, :cap)";
        $stmt1 = $pdo->prepare($query1);
        $ris1 = $stmt->execute(array(
            ':via' => $indirizzo->getVia(),
            ':numero' => $indirizzo->getNumero(),
            ':cap' => $indirizzo->getCap(),
            ':mailutente' => $mailutente));
        return $ris AND $ris1;
    }

    /**
     * Aggiorna i valori di un'istanza di EIndirizzo sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param EIndirizzo $indirizzo
     * @return bool
     */
    public static function update(EIndirizzo $indirizzo): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("UPDATE Indirizzo SET comune = :comune, provincia = :provincia, predefinito = :predefinito WHERE via=:via AND numerocivico=:numero AND cap=:cap");
        $ris = $stmt->execute(array(
            ':via' => $indirizzo->getVia(),
            ':numero' => $indirizzo->getNumero(),
            ':comune' => $indirizzo->getComune(),
            ':provincia' => $indirizzo->getProvincia(),
            ':cap' => $indirizzo->getCap(),
            ':predefinito' => $indirizzo->isPredefinito()));
        return $ris;
    }

    /**
     * Cancella un'istanza di EIndirizzo sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $via
     * @param int $numerocivico
     * @param string $cap
     * @param string $mailutente
     * @return bool
     */
    public static function delete(string $via, int $numerocivico, string $cap, string $mailutente): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("DELETE FROM Indirizzo WHERE via = :via AND numerocivico = :numero AND cap = :cap");
        $ris = $stmt->execute(array(
            ':via' => $via,
            ':numero' => $numerocivico,
            ':cap' => $cap));

        $stmt1 = $pdo->prepare("DELETE FROM UtenteSalvaIndirizzo WHERE via = :via AND numerocivico = :numero AND cap = :cap AND mailutente = :mailutente");
        $ris1 = $stmt1->execute(array(
            ':via' => $via,
            ':numero' => $numerocivico,
            ':cap' => $cap
            ':mailutente' => $mailutente));
        return $ris AND $ris1;
    }

    /**
     * Restituisce tutte le istanze di EIndirizzo presenti nell'apposita tabella del database ed appartenenti ad un
     * determinato utente.
     * @param string $mailutente
     * @return array
     */
    public static function prelevaIndirizzi(string $mailutente): array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM UtenteSalvaIndirizzo INNER JOIN Indirizzo 
                            ON UtenteSalvaIndirizzo.via = Indirizzo.via AND
                               UtenteSalvaIndirizzo.numerocivico = Indirizzo.numerocivico AND
                               UtenteSalvaIndirizzo.cap = Indirizzo.cap
                               WHERE UtenteSalvaIndirizzo.mailutente = :mailutente");
        $stmt->execute([':mailutente' => $mailutente]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $indirizzi = array();
        foreach ($rows as $row) {
            $ind = new EIndirizzo($row['via'],
                $row['numerocivico'],
                $row['comune'],
                $row['provincia'],
                $row['cap'],
                $row['predefinito']);
            $indirizzi[] = $ind;
        }
        return $indirizzi;
    }
}