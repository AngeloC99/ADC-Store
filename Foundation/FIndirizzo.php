<?php

/**
 * La classe FIndirizzo garantisce la permanenza dei dati per la classe EIndirizzo.
 * Class FIndirizzo
 * @package Foundation
 */

class FIndirizzo implements FBase
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EIndirizzo nell'apposita
     * tabella del database.
     * @param $via
     * @param $numerocivico
     * @param $cap
     * @return bool
     */
    public static function exist($via,  $numerocivico, $cap): bool {
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
     * @param $via
     * @param $numerocivico
     * @param $cap
     * @return EIndirizzo
     */
    public static function load($via, $numerocivico, $cap) : EIndirizzo {
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
     * @param $indirizzo
     * @param $mailutente
     * @return bool
     */
    public static function store($indirizzo, $mailutente = null): bool {
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
        return $ris;
    }

    /**
     * Aggiorna i valori di un'istanza di EIndirizzo sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param $indirizzo
     * @return bool
     */
    public static function update($indirizzo): bool {
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
     * @param $via
     * @param $numerocivico
     * @param $cap
     * @return bool
     */
    public static function delete($via, $numerocivico, $cap): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("DELETE FROM Indirizzo WHERE via = :via AND numerocivico = :numero AND cap = :cap");
        $ris = $stmt->execute(array(
            ':via' => $via,
            ':numero' => $numerocivico,
            ':cap' => $cap));
        return $ris;
    }

    /**
     * Restituisce tutte le istanze di EIndirizzo presenti nell'apposita tabella del database.
     * @return array
     */
    public static function prelevaIndirizzi(): array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM UtenteSalvaIndirizzo INNER JOIN Indirizzo 
                            ON UtenteSalvaIndirizzo.via = Indirizzo.via AND
                               UtenteSalvaIndirizzo.numerocivico = Indirizzo.numerocivico AND
                               UtenteSalvaIndirizzo.cap = Indirizzo.cap");
        $stmt->execute();
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