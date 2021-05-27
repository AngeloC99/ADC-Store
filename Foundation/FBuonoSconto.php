<?php


class FBuonoSconto implements FBase
{
    public static function exist($key, $key2, $key3): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice=?");
        $ris=$stmt->execute([$key]);
        return $ris;

    }

    public static function delete($key, $key2, $key3): bool
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("DELETE FROM BuonoSconto WHERE codice=?");
        $ris=$stmt->execute([$key]);
        return $ris;
    }

    public static function load($key, $key2, $key3) : EBuonoSconto
    {
        $pdo=FConnectionDB::connect();
        $stmt=$pdo->prepare("SELECT * FROM BuonoSconto WHERE codice=?");
        $stmt->execute([$key]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $a=$rows['ammontare'];
        $s=$rows['scadenza'];
        $p=$rows['percentuale'];
        $bs=new EBuonoSconto($p,$a);
        $bs->setScadenza($s);
        return $bs;
    }

    public static function store($bs, $mailutente): bool {
        $pdo = FConnectionDB::connect();
        $query = "INSERT INTO BuonoSconto VALUES(:cod, :amm, :perc, :scad, :mailutente)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':cod',$bs->getCodice());
        $stmt->bindParam(':amm',$bs->getAmmontare());
        $ris = $stmt->bindParam(':perc',$bs->isPercentuale());
        $stmt->bindParam(':scad',$bs->getScadenza());
        $stmt->bindParam(':mailutente',$mailutente);
        $ris=$stmt->execute();
        return $ris;
    }

    public static function update($bs1): bool
    {
        return false; //il buono non puo' essere aggiornato in alcun modo.
    }

}