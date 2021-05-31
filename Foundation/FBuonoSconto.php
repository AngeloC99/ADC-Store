<?php


class FBuonoSconto
{
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

    public static function delete(string $key): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("DELETE FROM BuonoSconto WHERE codice=:cod");
        $ris=$stmt->execute([":cod" => $key]);

        return $ris;
    }

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

    public static function update(EBuonoSconto $bs1): bool
    {
        return false; //il buono non puo' essere aggiornato in alcun modo.
    }

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

}