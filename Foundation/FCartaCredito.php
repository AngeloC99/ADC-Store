<?php

/**
 * La classe FCartaCredito garantisce la permanenza dei dati per la classe ECartaCredito.
 * Class FCartaCredito
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
    public static function exist(string $numero): bool
    {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM CartaCredito WHERE numero=:numero");
        $ris = $stmt->execute([':numero' => $numero]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) == 0) { return false; }
        else { return true; }
    }

    /**
     * Carica in RAM l'istanza di ECartaCredito che possiede la chiave primaria fornita.
     * @param string $numero
     * @return ECartaCredito
     */
    public static function load(string $numero) : ECartaCredito {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("SELECT * FROM CartaCredito WHERE numero=:numero");
        $stmt->execute([':numero' => $numero]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tit = $rows[0]['titolare'];
        $circ = $rows[0]['circuito'];
        $cvv = $rows[0]['cvv'];
        $amm = $rows[0]['ammontare'];
        $scad = new DateTime($rows[0]['scadenza']);
        $carta = new ECartaCredito($tit,$numero,$circ,$scad,$cvv,$amm);
        return $carta;
    }

    /**
     * Memorizza un'istanza di ECartaCredito sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param ECartaCredito $carta
     * @return bool
     */
    public static function store(ECartaCredito $carta): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO CartaCredito VALUES(:numero, :titolare, :circuito, :cvv, :ammontare, :scadenza)";
        $stmt = $pdo->prepare($query);
        $ris = $stmt->execute(array(
            ':numero' => $carta->getNumero(),
            ':titolare' => $carta->getTitolare(),
            ':circuito' => $carta->getCircuito(),
            ':cvv' => $carta->getCvv(),
            ':ammontare' => $carta->getAmmontare(),
            ':scadenza' => $carta->getScadenza()->format('y-m-d')));

        return $ris;
    }

    /**
     * Aggiorna i valori di un'istanza di ECartaCredito sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param ECartaCredito $carta
     * @return bool
     */
    public static function update(ECartaCredito $carta): bool {
        $pdo = FConnectionDB::connect();
        $pdo->exec('LOCK TABLE CartaCredito WRITE');
        $stmt = $pdo->prepare("UPDATE CartaCredito SET titolare = :titolare, circuito = :circuito, 
                            cvv = :cvv, ammontare = :ammontare, scadenza = :scadenza WHERE numero = :numero");
        $ris = $stmt->execute(array(
            ':numero' => $carta->getNumero(),
            ':titolare' => $carta->getTitolare(),
            ':circuito' => $carta->getCircuito(),
            ':cvv' => $carta->getCvv(),
            ':ammontare' => $carta->getAmmontare(),
            ':scadenza' => $carta->getScadenza()->format('y-m-d')));
        $pdo->exec('UNLOCK TABLES');
        return $ris;
    }

    /**
     * Cancella un'istanza di ECartaCredito sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $numero
     * @return bool
     */
    public static function delete(string $numero): bool {
        $pdo = FConnectionDB::connect();
        $stmt = $pdo->prepare("DELETE FROM CartaCredito WHERE numero = :numero");
        $ris = $stmt->execute([':numero' => $numero]);

        return $ris;
    }

}