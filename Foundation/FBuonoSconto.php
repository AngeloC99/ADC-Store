<?php


/**
 * Class FBuonoSconto
 * La classe FBuonoSconto gestisce la permanenza dei dati per la classe EBuonoSconto.
 */
class FBuonoSconto
{
    /**
     * Restituisce un booleano che indica la presenza o meno di una determinata istanza di EBuonoSconto nell'apposita
     * tabella del database.
     * @param string $key
     * @return bool
     */
    public static function exist(string $key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice=:cod");
        $stmt->execute([":cod" => $key]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) == 0){
            return false;
        }
        else{
            return true;
        }

    }

    /**
     * Cancella un'istanza di EBuonoSconto sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param string $key
     * @return bool
     */
    public static function delete(string $key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("DELETE FROM BuonoSconto WHERE codice=:cod");
        $ris=$stmt->execute([":cod" => $key]);

        return $ris;
    }

    /**
     * Carica in RAM l'istanza di EBuonoSconto che possiede la chiave primaria (codice) fornita.
     * @param string $key
     * @return EBuonoSconto
     */
    public static function load(string $key) : EBuonoSconto
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice=:cod");
        $stmt->execute([":cod" => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $a=$rows[0]['ammontare'];
        $s=DateTime::createFromFormat('Y-m-d',$rows[0]['scadenza']);
        $p=$rows[0]['percentuale'];
        $bs=new EBuonoSconto($p,$a);
        $bs->setScadenza($s);
        return $bs;
    }

    /**
     * Memorizza un'istanza di EBuonoSconto sul database e restituisce un booleano che indica l'esito dell'operazione.
     * @param EBuonoSconto $bs
     * @param string $mailutente
     * @return bool
     */
    public static function store(EBuonoSconto $bs, string $mailutente): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO BuonoSconto VALUES(:cod, :amm, :perc, :scad, :mailutente)";
        $stmt = $pdo->prepare($query);
        $ris=$stmt->execute(array(
            ":cod" => $bs->getCodice(),
            ":amm" => $bs->getAmmontare(),
            ":perc" => $bs->isPercentuale(),
            ":scad" => $bs->getScadenza()->format('Y-m-d'),
            ":mailutente" => $mailutente));

        return $ris;
    }

    /**
     * Aggiorna i valori di un'istanza di EBuonoSconto sul database e restituisce un booleano che indica l'esito
     * dell'operazione.
     * @param EBuonoSconto $bs1
     * @return bool
     */
    public static function update(EBuonoSconto $bs1): bool
    {
        return false; //il buono non puo' essere aggiornato in alcun modo.
    }

    /**
     * Recupera tutti i dati contenuti nella tabella BuonoSconto, per fornirli ricorsivamente al costruttore di EBuonoSconto , per poter poi restituire tutte le istanze corrispondenti.
     * @return array
     */
    public static function prelevaBuoni(): array {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $buoni = array();
        foreach ($rows as $row) {
            $buono=new EBuonoSconto($row['percentuale'],$row['ammontare']);
            $buono->setScadenza(DateTime::createFromFormat('Y-m-d',$row['scadenza']));
            $buono->setCodice($row['codice']);
            $buoni[] = $buono;
        }
        return $buoni;

    }

    /**
     * Cancella un'istanza di EBuonoSconto dal database se la data di scadenza risulta uguale a quella odierna, e restituisce un booleano che indica l'esito dell'operazione.
     * @return array
     */
    public static function deleteBuoniScaduti(string $key): bool{
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice= :cod");
        $stmt->execute([":cod" => $key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $check=new DateTime('now');
        $check=$check->format('Y-m-d');
        if ($check==$rows[0]['scadenza']){
            $stmt=$pdo->prepare("DELETE FROM BuonoSconto WHERE codice =:cod");
            $ris=$stmt->execute([":cod" => $key]);
        }
        else{
            $ris=false;
        }
        return $ris;
    }

}
