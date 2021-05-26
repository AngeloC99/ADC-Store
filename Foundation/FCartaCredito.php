<?php

/**
 * La classe FCartaCredito garantisce la permanenza dei dati per la classe ECartaCredito.
 * Class FCartaCredito
 * @access public
 * @package Foundation
 */

class FCartaCredito
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di ECartaCredito nell'apposita
     * tabella del database.
     * @param string $numero
     * @return bool
     */
    public static function exist(string $numero,string $key2='', string $key3=''): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM CartaCredito WHERE numero=:numero");
        $ris = $stmt->execute([':numero' => $numero]);
        return $ris;
    }

    /**
     * Carica in RAM l'istanza di ECartaCredito che possiede la chiave primaria fornita.
     * @param string $numero
     * @return ECartaCredito
     */
    public static function load(string $numero,string $key2='', string $key3='') : ECartaCredito {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM CartaCredito WHERE numero=:numero");
        $stmt->execute([':numero' => $numero]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tit = $rows[0]['titolare'];
        $circ = $rows[0]['circuito'];
        $cvv = $rows[0]['cvv'];
        $amm = $rows[0]['ammontare'];
        $scad = $rows[0]['scadenza'];
        $carta = new ECartaCredito($tit,$numero,$circ,$scad,$cvv,$amm);
        return $carta;
    }

    /**
     * Memorizza un'istanza di ECartaCredito sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param ECartaCredito $carta
     * @param string $mailutente
     * @return bool
     */
    public static function store(ECartaCredito $carta, string $mailutente): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO CartaCredito VALUES(:numero, :titolare, :circuito, :cvv, :ammontare, :scadenza)";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute(array(
            ':numero' => $carta->getNumero(),
            ':titolare' => $carta->getTitolare(),
            ':circuito' => $carta->getCircuito(),
            ':cvv' => $carta->getCvv(),
            ':ammontare' => $carta->getAmmontare(),
            ':scadenza' => $carta->getScadenza()));

        $query1 = "INSERT INTO UtenteUsaCarta VALUES(:mailutente, :numerocarta)";
        $stmt1 = $pdo->prepare($query);
        $ris1 = $stmt1->execute(array(
            ':mailutente' => $carta->getNumero(),
            ':numerocarta' => $mailutente));
        return $ris AND $ris1;
    }

    /**
     * Aggiorna i valori di un'istanza di ECartaCredito sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param ECartaCredito $carta
     * @return bool
     */
    public static function update(ECartaCredito $carta): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("UPDATE CartaCredito SET titolare = :titolare, circuito = :circuito, cvv = :cvv, ammontare = :ammontare, scadenza = :scadenza WHERE numero = :numero");
        $ris = $stmt->execute(array(
            ':numero' => $carta->getNumero(),
            ':titolare' => $carta->getTitolare(),
            ':circuito' => $carta->getCircuito(),
            ':cvv' => $carta->getCvv(),
            ':ammontare' => $carta->getAmmontare(),
            ':scadenza' => $carta->getScadenza()));
        return $ris;
    }

    /**
     * Cancella un'istanza di ECartaCredito sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $numero
     * @param string $mailutente
     * @return bool
     */
    public static function delete(string $numero, string $mailutente): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("DELETE FROM CartaCredito WHERE numero = :numero");
        $ris = $stmt->execute([':numero' => $numero]);
        $stmt1 = $pdo->prepare("DELETE FROM UtenteUsaCarta WHERE mailutente = :mailutente AND numerocarta = :numerocarta");
        $ris1 = $stmt1->execute(array(':mailutente' => $mailutente,':numerocarta' => $numero));
        return $ris AND $ris1;
    }

    /**
     * Restituisce tutte le istanze di ECartaCredito presenti nell'apposita tabella del database ed appartenenti ad un
     * determinato utente.
     * @param string $mailutente
     * @return array
     */
    public static function prelevaCarte(string $mailutente): array {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM CartaCredito INNER JOIN UtenteUsaCarta 
                                ON CartaCredito.numero = UtenteUsaCarta.numero 
                                WHERE UtenteUsaCarta.mailutente = :mailutente");
        $stmt->execute([':mailutente' => $mailutente]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $carte = array();
        foreach ($rows as $row) {
            $carta = new ECartaCredito($row['titolare'],
                $row['numero'],
                $row['circuito'],
                $row['scadenza'],
                $row['cvv'],
                $row['ammontare']);
            $carte[] = $carta;
        }
        return $carte;
    }
}